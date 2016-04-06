<?php

namespace app\modules\guest\controllers;

use yii\web\Controller;

class LocationsController extends Controller
{
    public function actionIndex(){
        
        $germplasmArray = array();
        
        $rows = \app\modules\corn\models\Germplasm::find();
        if(!empty($rows)){
            foreach($rows as $row){
                $phl_no = !empty($row->phl_no) ? $row->phl_no : '';
                $latitude = !empty($row->latitude) ? $row->latitude : '';
                $longitude = !empty($row->longitude) ? $row->longitude : '';
                
                array_push($germplasmArray,array('germplasm'=>$phl_no,
                    'latitude'=>$latitude,'longitude'=>$longitude));
            }
        }
        
        $locations = ($germplasmArray);
        $data = array(
            'locations' => $locations
        );
        
        return $this->render('index',$data);
    }
}
