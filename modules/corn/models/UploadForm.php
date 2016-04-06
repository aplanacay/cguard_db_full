<?php

namespace app\modules\corn\models;

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
                    \ChromePhp::log($var);
                    if ($var === '"cultivar/variety_name/pedigree"') {
                        $var1 = '"variety_name"';
                        $var = '"variety_name"';
                    }
                    if ($var === '"source/grower"') {
                        $var1 = '"grower"';
                        $var = '"grower"';
                    }
                }
                $columnStr .= $var1 . " character varying,";
                $column.=$var . ",";
                $validVar[] = $var;
            }
           // die();
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
                
            } else {
                $var = Attributes::find()->where(['abbrev' => strtoupper($abbrev),])->one();
                \ChromePhp::log($var);
                if (empty($var) || is_null($var)) {

                    $obs[] = $abbrev;
                } else {
                    \ChromePhp::log($var->id);
                    if ($var->type === 'identification') {
                        if ($abbrev !== 'phl_no' && $abbrev !== 'old_acc_no' && $abbrev !== 'gb_no') {

                            if ($abbrev === 'cultivar/variety_name/pedigree') {
                                $abbrev = 'variety_name';
                            }
                            if ($abbrev === 'source/grower') {
                                $abbrev = 'grower';
                            }
                            $iden[] = $abbrev;
                        }
                    } else {
                        $obs[] = $abbrev;
                    }
                }
            }
        }

        return array('iden' => $iden, 'obs' => $obs);
    }

    public function prepare() {
        UploadForm::saveData('temporary_data.corncharconsolidatedjan2009b', array('phl_no', 'gb_no', 'old_scc_no'), array("days_to_emergence", "days_to_tasseling", "days_to_slking", "days_to_harvest", "tillering_index", "stem_color", "sheath_pubescence", "total_number_of_leaves_per_plant", "leaf_length", "leaf_width", "leaf_orientation", "presence_of_leaf_ligule", "venation_index", "tassel_type", "silk_color", "tassel_color", "plant_height", "ear_height", "foliage", "number_of_leaves_above_upper_ear", "number_of_leaves_below_upper_ear", "number_of_internodes_below_uppermost_ear", "number_of_internodes_on_the_whole_stem", "stem_diameter_at_the_base", "stem_diameter_below_uppermost_ear", "tassel_length", "tassel_peduncle_length", "tassel_branching_space", "number_of_primary_branches_on_tassel", "number_of_secondary_branches_on_tassel", "number_of_tertiary_branches_on_tassel", "stay_green", "days_to_ear_leaf_inflorescence", "stalk_lodging", "husk_cover", "husk_fitting", "husk_tip_shape", "ear_shape", "ear_tip_shape", "ear_orientation", "ear_length", "ear_diameter", "cob_diameter", "rachs_diameter", "peduncle_length", "number_of_bracts", "kernel_row_arrangement", "number_of_kernel_rows", "number_of_kernels__per_row", "cob_color", "grain_shedding", "kernel_type", "kernel_color", "kernel_length", "kernel_width", "kernel_thickness", "shape_of_upper_kernel_surface", "pericarp_color", "aleurone_color", "endosperm_color", "unshelled_weight", "shelled_weight", "kernel_weight", "shellpc"));
    }

    public function saveData($tbl_name, $iden, $obs) {
        \ChromePhp::log('save data');

        //insert phl_no
        $user_id = \Yii::$app->user->getId();
        $germplasm_metadata_inserted = array();
        $germplasm_count_inserted = array();
        $updated_records_count = array();
        $obsStr = implode(",", $iden);
        $insert_sql = <<<EOD
        INSERT INTO catalog.germplasm(phl_no,gb_no,old_acc_no,creation_timestamp,creator_id,crop_id,$obsStr) 
            (SELECT phl_no,gb_no,old_acc_no,now() as creation_timestamp,{$user_id} as creator_id,
                1 as crop_id,$obsStr from $tbl_name  
                     where phl_no not in  
                          (select phl_no from catalog.germplasm) and gb_no not in 
                            (select gb_no from catalog.germplasm) and old_acc_no not in 
                                (select old_acc_no from catalog.germplasm)) returning germplasm.id
EOD;
        $query = \Yii::$app->db;
        \ChromePhp::log($insert_sql);
        $germplasm_count_inserted = $query->createCommand($insert_sql)->execute();
        \ChromePhp::log($germplasm_count_inserted);
        \ChromePhp::log('iden:');
        \ChromePhp::log($iden);
        if (!empty($iden)) {
            $columnStr = '';
            $condition = '';
            foreach ($iden as $i => $abbrev) {
                if (strpos($abbrev, '/')) {
                    $abbrev = '"' . $abbrev . '"';
                }
                if ($i !== count($iden) - 1) {
                    $columnStr .= "" . strtolower($abbrev) . "=t." . strtolower($abbrev) . ",";
                    $condition.="germplasm." . strtolower($abbrev) . "<>t." . strtolower($abbrev) . " or ";
                } else {
                    $columnStr .= "" . strtolower($abbrev) . "=t." . strtolower($abbrev);
                    $condition.="germplasm." . strtolower($abbrev) . "<>t." . strtolower($abbrev);
                }
            }
            $insert_sql = <<<EOD
                        update catalog.germplasm set {$columnStr} from $tbl_name t
                            where  
                                 germplasm.phl_no=t.phl_no returning germplasm.phl_no; --and ({$condition});
EOD;
            $query = \Yii::$app->db;
            \ChromePhp::log($insert_sql);
            $updated_records_count = $query->createCommand($insert_sql)->queryAll();
        }
        if (!empty($obs)) {
            $columnStr = '';
//            foreach ($obs as $i => $abbrev) {
//                \ChromePhp::log('abbrev: ' . $abbrev);
//                $var = Attributes::find()->where(['label' => strtolower($abbrev),])->one();
//                \ChromePhp::log($var);
//                $abbrev_up = strtoupper($abbrev);
////                $delete_sql = <<<EOD
////         delete from {$tbl_name} t
////                        using
////                 corn.germplasm_attribute gm,
////                corn.germplasm g,
////                master.variable v
////                where 
////                v.abbrev='{$abbrev_up}' and
////                v.id=gm.variable_id 
////                and gm.germplasm_id=g.id
////                and g.phl_no=t.phl_no
////EOD;
////                $query = \Yii::$app->db;
////                \ChromePhp::log($insert_sql);
////                $del = $query->createCommand($delete_sql)->execute();
//                if (strpos($abbrev, '/')) {
//                    $abbrev = '"' . $abbrev . '"';
//                }
//
//
//
//                $insert_sql = <<<EOD
//        INSERT INTO catalog.germplasm_attribute (value,variable_id,germplasm_id,creation_timestamp,creator_id) (SELECT t.{$abbrev} as value,{$var->id} as variable_id,germplasm.id as germplasm_id,now() as creation_timestamp,{$user_id} as creator_id from $tbl_name t,corn.germplasm where germplasm.phl_no=t.phl_no or t.gb_no::text=germplasm.gb_no or t.old_acc_no::text=germplasm.old_acc_no)
// returning germplasm_attribute.id
//EOD;
//                $query = \Yii::$app->db;
//                \ChromePhp::log($insert_sql);
//               // $germplasm_metadata_inserted = $query->createCommand($insert_sql)->execute();
//            }
        }
//        \ChromePhp::log($germplasm_count_inserted);
//        \ChromePhp::log($germplasm_metadata_inserted);
//        \ChromePhp::log($updated_records_count);
        return array('germplasm_count_inserted' => $germplasm_count_inserted, 'updated_records_count' => count($updated_records_count), 'germplasm_metadata_inserted' => count($germplasm_metadata_inserted));
    }

}
