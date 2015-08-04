<?php
namespace app\models;

use app\models\CropsBaseModel;

class Crops extends CropsBaseModel{
    
    public static function loadCropData(){
        
        $file = fopen("/Users/jlagare/Downloads/CORNPASS2013_CSV.csv", "r");
        
        while(!feof($file)) {
            
            $line_of_text[] = fgetcsv($file);
            
            var_dump($line_of_text);
            print "<br/><hr/>";
            $cropModel = new Crops();
        
            $cropModel->phl_no = $line_of_text[0];
            $cropModel->old_accession_no = $line_of_text[1];
            $cropModel->gb_no = $line_of_text[2];
            $cropModel->collecting_no = $line_of_text[3];
            $cropModel->name = $line_of_text[4];
            $cropModel->dialect = $line_of_text[5];
            $cropModel->source = $line_of_text[6];
            $cropModel->scientific_name = $line_of_text[7];
            $cropModel->country = $line_of_text[8];
            $cropModel->province = $line_of_text[9];
            $cropModel->town = $line_of_text[10];
            $cropModel->barangay = $line_of_text[11];
            $cropModel->sitio = $line_of_text[12];
            $cropModel->acquisition_date = $line_of_text[13];
            $cropModel->remarks = $line_of_text[14];
            $cropModel->latitude = $line_of_text[15];
            $cropModel->longitude = $line_of_text[16];
            $cropModel->altitude = $line_of_text[17];
            $cropModel->collection_source = $line_of_text[18];
            $cropModel->gen_stat = $line_of_text[19];
            $cropModel->sam_type = $line_of_text[20];
            $cropModel->sam_met = $line_of_text[21];
            $cropModel->mat = $line_of_text[22];
            $cropModel->topo = $line_of_text[23];
            $cropModel->site = $line_of_text[24];
            $cropModel->soil_tex = $line_of_text[25];
            $cropModel->drain = $line_of_text[26];
            $cropModel->soil_col = $line_of_text[27];
            $cropModel->ston = $line_of_text[28];   
            
            //$cropModel->save();
            
        }
        
        fclose($file);
    }
}