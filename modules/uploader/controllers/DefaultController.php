<?php

namespace app\modules\uploader\controllers;

use yii\web\Controller;
use app\models\Crops;

class DefaultController extends Controller {

    public function actionIndex() {
        //Crops::loadCropData();
        return $this->render('index');
    }

    public function actionLoad($type = NULL) {
        if($type == 'crop'){
            Crops::loadCropData();
        }
    }

}
