<?php
namespace app\modules\catalog\controllers;
use yii\web\Controller;
use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadController
 *
 * @author NCarumba
 */
class UploadController extends Controller {

    public function actionIndex() {
        $inputFile = Yii::getAlias('@webroot').'/files/CORNPASS2013.xlsx';
        \ChromePhp::log($inputFile );
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
       // $sheet = $excelObj->getSheet(0);
        //foreach ($worksheetNames as $key => $sheetName) {
            // Set the current active worksheet by name
//            \ChromePhp::log('sheet name: '.$sheetName);
//            $excelObj->setActiveSheetIndexByName($sheetName);
//            $return[$sheetName] = $excelObj->getActiveSheet()->toArray(null, TRUE, TRUE, TRUE);
//            \ChromePhp::log('key: '.$key);
//            if ($key === 1) {
                //$objWriter->setSheetIndex(0);

//                $row = 1;
////
//                $lastColumn = $excelObj->getActiveSheet()->getHighestColumn();
//                $lastColumn++;
//                $highestRow = $excelObj->getActiveSheet()->getHighestRow();
//                \ChromePhp::log('last row:'.$lastColumn);
//                \ChromePhp::log('highest row:'.$highestRow);
//                for ($column = 'A'; $column != $lastColumn; $column++) {
//                    //ChromePhp::log($column . $row);
//                    $cell = $excelObj->getActiveSheet()->getCell($column . $row);
//                    \ChromePhp::log($cell);
//                }

                $fname = 'dc-' . Yii::$app->user->id . '-' . uniqid() . '.csv';
                $objWriter->save(Yii::getAlias("@webroot") . '/files' . '/' . $fname);
//            }
//            $sheet_arr[$key] = $sheetName;
//        }

//        $sheet = $objPHPExcel->getSheet(0);
//        $hightestRow = $sheet->getHighestRow();
//        $hightestColumn = $sheet->getHighestColumn();
//        for ($row = 1; $row <= $hightestRow; $row++) {
//            $rowData = $sheet->rangeToArray('A' . $row . ':' . $hightestColumn . $row, NULL, TRUE, FALSE);
//            if ($row == 1) {
//                $continue;
//            }
//            // $branch=new
//        }
    }

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

    public static function getVariablesFromFile($data) {

        $variables = [];
        if (isset($data[0])) {
            $variables = explode(';', $data[0]);
        }
        return $variables;
    }

    public static function createTemporaryTable($fileContents, $variables) {
        $user_id = \Yii::$app->user->getId();
        $tbl_name = 'temporary_data.data_coll_' . uniqid() . '_' . $user_id;

        Yii::app()->db->createCommand()->createTable($tbl_name, array());
        $columnStr = '';
        $delimiter = ';';
        foreach ($variables as $i => $var) {

            //  $var = preg_replace("/[^\w\d\s\.\-\/+\!;\n\t\r]/i","", $var);
            $var = preg_replace('/\s+/', '_', $var);
            if ($var === " " || $var === "" || empty($var)) {
                $var = "empty_column";
            }

            if ($i != count($var) - 1) {
                if ($val != '' || $val != '\n') {
                    $columnStr .= $val . ",";
                }
            } else {
                if ($val != '' || $val != '\n') {
                    $columnStr .= $val;
                }
            }
            Yii::app()->db->createCommand()->addColumn($tbl_name, trim($var), "character varying");
        }

        Yii::app()->db->createCommand("COPY " . $tbl_name . " (" . $columnStr . ") FROM '" . $tempFileName . "' DELIMITERS '" . $delimiter . "' CSV HEADER QUOTE E'\"' ESCAPE E'\\\' NULL AS '';")->execute();
    }

}
