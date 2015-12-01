<?php

namespace app\modules\catalog\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model {

    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['file'], 'file', 'extensions' => 'xls, xlsx',],
        ];
    }

    /**
     * Creates a csv file from the excel file.
     * 
     * @param type $inputFile path of the file
     */
    public function writeCSV($inputFile) {
        //$inputFile = Yii::getAlias('@webroot') . '/files/CORNPASS2013.xlsx';
        \ChromePhp::log($inputFile);
        $success = false;
        $error = '';
        $temporary_table = '';
        $validVariables = array();
        //$reader = \PHPExcel_IOFactory::createReader('Excel2007');

        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $excelObj = $objReader->load($inputFile);
            $objWriter = \PHPExcel_IOFactory::createWriter($excelObj, 'CSV');
            $objWriter->setDelimiter(";");
            $objWriter->setEnclosure('"');
            $objWriter->setPreCalculateFormulas(FALSE);

            $fname = 'dc-' . Yii::$app->user->id . '-' . uniqid() . '.csv';
            $objWriter->save(Yii::getAlias("@webroot") . '/files' . '/' . $fname);

            $data = UploadForm::readFile(Yii::getAlias("@webroot") . '/files' . '/' . $fname);

            $response_createTemporaryTable = UploadForm::createTemporaryTable($data, UploadForm::getVariablesFromFile($data), Yii::getAlias("@webroot") . '/files' . '/' . $fname);
            if ($response_createTemporaryTable['success']) {
                $success = true;
                $temporary_table = $response_createTemporaryTable['temporary_table'];
                $validVariables = $response_createTemporaryTable['valid_variables'];
            } else {
                $error = $response_createTemporaryTable['error_message'];
            }
        } catch (Exception $e) {
            //   die('Error');
            $error = 'Failed to upload file. Error in creating CSV file. Please contact administrator.';
        }
        return array(
            "success" => $success,
            "error_message" => $error,
            "filePath" => Yii::getAlias("@webroot") . '/files' . '/' . $fname,
            "temporary_table" => $temporary_table,
            'valid_variables' => $validVariables,
        );
    }

    /**
     * Return an array of the file content
     * @param type $filename path of the file
     * @return array file content data
     */
    public static function readFile($filename) {

        $data = array();

        $lines = file($filename, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $num_rows = count($lines);

        foreach ($lines as $line) {
            $csv = str_getcsv($line);
            if (count(array_filter($csv)) == 0) {
                $num_rows--;
            } else {
                array_push($data, $line);
            }
        }
        return $data;
    }

    /**
     * 
     * @param type $data content of the file in array
     * @return type array of the column headers
     */
    public static function getVariablesFromFile($data) {

        $variables = [];
        if (isset($data[0])) {
            $variables = explode(';', $data[0]);
        }
        return $variables;
    }

    public static function createTemporaryTable($fileContents, $variables, $fileName) {
        $success = false;
        $error = '';
        try {
            $user_id = \Yii::$app->user->getId();
            $tbl_name = 'temporary_data.data_coll_' . uniqid() . '_' . $user_id;
            $columnStr = '';
            $column = '';
            $delimiter = ';';
            $validVar = array();
            foreach ($variables as $i => $var) {

                $var = preg_replace('/\s+/', '_', strtolower($var));
                $var = preg_replace('/\./', '', strtolower($var));
                $var = preg_replace('/\/\_/', '/', strtolower($var));

                if (empty($var) || $var === '""') {
                    $var = 'empty_column' . $i;
                    $var1 = $var;
                } else {
                    if (strpos($var, '/')) {
                        $var1 = $var;
                    } else {
                        $var1 = preg_replace('/\"/', '', $var);
                    }
                }
                $columnStr .= $var1 . " character varying,";
                $column.=$var . ",";
                $validVar[] = $var;
            }
            $column = rtrim($column, ',');
            $columnStr = rtrim($columnStr, ',');
            $commandR = "CREATE TABLE " . $tbl_name . "(" . $columnStr . ");";
            $query = \Yii::$app->db;
            $command = $query->createCommand($commandR);
            \ChromePhp::log('create table :' . $commandR);
            $command->execute();
            $sql = "COPY " . $tbl_name . " (" . strtolower($column) . ") FROM '" . $fileName . "' DELIMITERS '" . $delimiter . "' CSV HEADER QUOTE E'\"' ESCAPE E'\\\' NULL AS '';";
            Yii::$app->db->createCommand($sql)->execute();
            $success = true;
        } catch (Exception $e) {

            \ChromePhp::log($e->getMessage());
            $error = 'Failed to upload file. Error in importing file to database. Please contact administrator.';
            die();
        }
        return array(
            "success" => $success,
            "error_message" => $error,
            'temporary_table' => $tbl_name,
            'valid_variables' => $validVar);
    }

    public function saveVariable($variables, $tbl_name) {
        $iden = array();
        $obs = array();
        $deleteStr = '';
        $dropColumnStr = '';
        foreach ($variables as $i => $abbrev) {
            $abbrev = preg_replace('/\"/', '', $abbrev);
            if (strpos($abbrev, 'empty_column') !== false) {

                $dropColumnStr .= 'DROP COLUMN ' . $abbrev . ',';
            } else {
                $var = Attributes::find()->where(['abbrev' => strtoupper($abbrev),])->one();

                if (empty($var) || is_null($var)) {
                    $new_var = new Attributes();
                    $new_var->abbrev = strtoupper($abbrev);
                    //$new_var->is_void = false;
                    $new_var->type = 'observation';
                    $new_var->data_type = 'observation';

                    $new_var->save();
                    $obs[] = $abbrev;
                } else {
                    if ($var->type === 'identification') {
                        if ($abbrev !== 'phl_no' || $abbrev !== 'gb_no' || $abbrev !== 'old_acc_no')
                            $iden[] = $abbrev;
                    } else {
                        $obs[] = $abbrev;
                    }
                }
                if (strpos($abbrev, '/')) {
                    $abbrev = '"' . $abbrev . '"';
                }

                $deleteStr .= "(" . $abbrev . ' is null or ' . $abbrev . "='') and ";
            }
        }
        $deleteStr = rtrim($deleteStr, "and ");
        $dropColumnStr = rtrim($dropColumnStr, ",");
        if (!empty($dropColumnStr)) {
            $alterTable_sql = <<<EOD
                        ALTER TABLE {$tbl_name} {$dropColumnStr}
EOD;
            $query = \Yii::$app->db;
            $query->createCommand($alterTable_sql)->execute();
        }
        $delete_sql = <<<EOD
                        delete from {$tbl_name} where {$deleteStr}
EOD;
        $query = \Yii::$app->db;
        \ChromePhp::log($delete_sql);
        $query->createCommand($delete_sql)->execute();
        return array('iden' => $iden, 'obs' => $obs);
    }

    public function saveData($tbl_name, $iden, $obs) {
        \ChromePhp::log('save data');

        //insert phl_no
        $user_id = \Yii::$app->user->getId();
        $insert_sql = <<<EOD
        INSERT INTO catalog.g1(phl_no,gb_no,old_acc_no,creation_timestamp,creator_id,crop_id) (SELECT phl_no,gb_no,old_acc_no,now() as creation_timestamp,{$user_id} as creator_id,1 as crop_id from $tbl_name where phl_no not in (select phl_no from catalog.g1) and gb_no not in (select gb_no from catalog.g1) and old_acc_no not in (select old_acc_no from catalog.g1)) returning g1.id
EOD;
        $query = \Yii::$app->db;
        \ChromePhp::log($insert_sql);
        $germplasm_count_inserted = $query->createCommand($insert_sql)->execute();

        if (!empty($iden)) {
            $columnStr = '';
            $condition = '';
            foreach ($iden as $i => $abbrev) {
                if (strpos($abbrev, '/')) {
                    $abbrev = '"' . $abbrev . '"';
                }
                if ($i !== count($iden) - 1) {
                    $columnStr .= "" . strtolower($abbrev) . "=t." . strtolower($abbrev) . ",";
                    $condition.="g1." . strtolower($abbrev) . "<>t." . strtolower($abbrev) . " or ";
                } else {
                    $columnStr .= "" . strtolower($abbrev) . "=t." . strtolower($abbrev);
                    $condition.="g1." . strtolower($abbrev) . "<>t." . strtolower($abbrev);
                }
            }
            $insert_sql = <<<EOD
                        update catalog.g1 set {$columnStr} from $tbl_name t where g1.phl_no=t.phl_no and g1.gb_no=t.gb_no and g1.old_acc_no=t.old_acc_no returning g1.phl_no; --and ({$condition});
EOD;
            $query = \Yii::$app->db;
            \ChromePhp::log($insert_sql);
            $updated_records_count = $query->createCommand($insert_sql)->queryAll();
        }
        if (!empty($obs)) {
            $columnStr = '';
            foreach ($obs as $i => $abbrev) {
                $var = Attributes::find()->where(['abbrev' => strtoupper($abbrev),])->one();
                if (strpos($abbrev, '/')) {
                    $abbrev = '"' . $abbrev . '"';
                }
                $insert_sql = <<<EOD
        INSERT INTO catalog.germplasm_attribute (value,variable_id,germplasm_id,creation_timestamp,creator_id) (SELECT t.{$abbrev} as value,{$var->id} as variable_id,g1.id as germplasm_id,now() as creation_timestamp,{$user_id} as creator_id from $tbl_name t,catalog.g1 where g1.phl_no=t.phl_no and t.gb_no=g1.gb_no and t.old_acc_no=g1.old_acc_no)
 returning germplasm_attribute.id
EOD;
                $query = \Yii::$app->db;
                \ChromePhp::log($insert_sql);
                $germplasm_count_inserted = $query->createCommand($insert_sql)->execute();
            }
        }
        \ChromePhp::log("germplasm_count_inserted: " . count($germplasm_count_inserted));
        \ChromePhp::log("updated_records_count: " . count($updated_records_count));
        return array('germplasm_count_inserted' => count($germplasm_count_inserted), 'updated_records_count' => count($updated_records_count));
    }

}