<?php

namespace app\modules\catalog\controllers;

use yii\web\Controller;
use Yii;
use app\modules\catalog\models\UploadForm;
use yii\web\UploadedFile;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Imports excel files then converts to csv for database import.
 *
 * @author NCarumba
 */
class UploadController extends Controller {

    public function actionIndex() {
        Yii::$app->session->set('curr_page', 'catalog-import');
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                $response = UploadForm::writeCSV('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                if ($response['success']) {
                    $response_saveVariable = UploadForm::saveVariable($response['valid_variables'], $response['temporary_table']);
                    $result = UploadForm::saveData($response['temporary_table'], $response_saveVariable['iden'], $response_saveVariable['obs']);
                    Yii::$app->session->setFlash('success', '<b>' . $result['germplasm_count_inserted'] . '</b> germplasm <b>added</b> in the database. <br><b>' . $result['updated_records_count'] . '</b> germplasm records <b>updated</b>. <br><b>' . $result['germplasm_metadata_inserted'] . '</b>  characteristics <b>added</b> in the database.');
                } else {
                    Yii::$app->session->setFlash('error', $response['error_message']);
                }
                //return $this->redirect('upload');
            }
        }

        return $this->render('index', ['model' => $model]);
    }

}
