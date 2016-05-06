<?php

namespace app\modules\corn\controllers;

use yii\web\Controller;
use ChromePhp;

class LocationsController extends Controller
{
    public function actionIndex(){
       
        $germplasmArray = array();
        
        $rows = \app\modules\corn\models\Germplasm::find()->asArray()->all();
        
        for($i=0;$i<count($rows);$i++){
            
             if(empty($rows[$i]['latitude']) || empty($rows[$i]['longitude'])){
                    continue;
                }

                $phl_no = !empty($rows[0]['phl_no']) ? $rows[0]['phl_no'] : '';
                $latitude = !empty($rows[$i]['latitude']) ? $rows[$i]['latitude'] : '';
                $longitude = !empty($rows[$i]['longitude']) ? $rows[$i]['longitude'] : '';

                array_push($germplasmArray,array($phl_no,$latitude,$longitude));
        }

     
        $locations = ($germplasmArray);

        $data = array(
            'locations' => ($locations)
        );
        
        return $this->render('index',$data);
    }
}
