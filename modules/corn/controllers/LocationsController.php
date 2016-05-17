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

                $phl_no = !empty($rows[$i]['phl_no']) ? $rows[$i]['phl_no'] : '';
                $gb_no = !empty($rows[$i]['gb_no']) ? $rows[$i]['gb_no'] : '';
                $old_acc_no = !empty($rows[$i]['old_acc_no']) ? $rows[$i]['old_acc_no'] : '';
                $other_no = !empty($rows[$i]['other_number']) ? $rows[$i]['other_number'] : '';
                $latitude = !empty($rows[$i]['latitude']) ? $rows[$i]['latitude'] : '';
                $longitude = !empty($rows[$i]['longitude']) ? $rows[$i]['longitude'] : '';
                $id = $rows[$i]['id'];

                array_push($germplasmArray,array($phl_no,$gb_no,$old_acc_no,$other_no,$latitude,$longitude,$id));
        }

     
        $locations = ($germplasmArray);

        $data = array(
            'locations' => ($locations)
        );
        
        return $this->render('index',$data);
    }
}
