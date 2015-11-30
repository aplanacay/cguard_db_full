<?php

namespace app\modules\catalog\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file','extensions' => 'xls, xlsx',],
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
        $reader = \PHPExcel_IOFactory::createReader('Excel2007');

        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $excelObj = $objReader->load($inputFile);
        } catch (Exception $e) {
            die('Error');
        }
        $objWriter = \PHPExcel_IOFactory::createWriter($excelObj, 'CSV');
        $objWriter->setDelimiter(";");
        $objWriter->setEnclosure('"');
        $objWriter->setPreCalculateFormulas(FALSE);

        $fname = 'dc-' . Yii::$app->user->id . '-' . uniqid() . '.csv';
        $objWriter->save(Yii::getAlias("@webroot") . '/files' . '/' . $fname);

        $data = UploadForm::readFile(Yii::getAlias("@webroot") . '/files' . '/' . $fname);

        UploadForm::createTemporaryTable($data, UploadForm::getVariablesFromFile($data), Yii::getAlias("@webroot") . '/files' . '/' . $fname);
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

        try {
            $user_id = \Yii::$app->user->getId();
            $tbl_name = 'temporary_data.data_coll_' . uniqid() . '_' . $user_id;
            $columnStr = '';
            $column = '';
            $delimiter = ';';
            foreach ($variables as $i => $var) {
                $var = preg_replace('/\s+/', '_', strtolower($var));
                $var = preg_replace('/\./', '', strtolower($var));
                $var = preg_replace('/\/\_/', '/', strtolower($var));

                if ($var === " " || $var === "" || empty($var)) {
                    $var = "empty_column";
                }

                if (strpos($var, '/')) {
                    $var1 = $var;
                } else {
                    $var1 = preg_replace('/\"/', '', $var);
                }

                if ($i !== count($variables) - 1) {

                    $columnStr .= $var1 . " character varying,";
                    $column.=$var . ',';
                } else {

                    $columnStr .= $var1 . " character varying";
                    $column.=$var;
                }
            }

            $commandR = "CREATE TABLE " . $tbl_name . "(" . $columnStr . ");";
            $query = \Yii::$app->db;
            $command = $query->createCommand($commandR);
            $command->execute();
            $sql = "COPY " . $tbl_name . " (" . strtolower($column) . ") FROM '" . $fileName . "' DELIMITERS '" . $delimiter . "' CSV HEADER QUOTE E'\"' ESCAPE E'\\\' NULL AS '';";
            Yii::$app->db->createCommand($sql)->execute();
        } catch (Exception $e) {
            \ChromePhp::log($e->getMessage());
        }
    }
}