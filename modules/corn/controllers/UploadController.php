<?php

namespace app\modules\corn\controllers;

use yii\web\Controller;
use Yii;
use app\modules\corn\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Imports excel files then converts to csv for database import.
 *
 * @author Nikki Carumba <n.carumba@irri.org>
 * 
 */
class UploadController extends Controller {

    public function actionIndex() {
        Yii::$app->session->set('curr_page', 'corn-import');
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

    public function actionImport() {
        UploadForm::prepare();
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionImage($id) {


        $model = \app\modules\corn\models\Image::find()->where(['germplasm_id' => $id])->one();

        if ($model !== null) {
            $model = new \app\modules\corn\models\Image();
            $model = $this->findModel($id);

            // validate deletion and on failure process any exception 
            // e.g. display an error message 
            if ($model->delete()) {
                if (!$model->deleteImage()) {
                    Yii::$app->session->setFlash('error', 'Error deleting image');
                }
            }
        } else {
            $model = new \app\modules\corn\models\Image();
        }
        if ($model->load(Yii::$app->request->post())) {
            //    ChromePhp::log('here');
            // process uploaded image file instance
            //$model = \app\modules\corn\models\Germplasm::find($id);
            $image = $model->uploadImage();
            $model->setAttribute('germplasm_id', $id);
            if ($model->save()) {

                // upload only if valid uploaded file instance found
                if ($image !== false) {

                    $path = $model->getImageFile();
                    \ChromePhp::log($path);
                    $image->saveAs($path);
                }
                $this->redirect(['/corn/view', 'id' => $id]);
                //return $this->redirect(['view', 'id' => $model->id]);
            } else {
                \ChromePhp::log($model->getErrors());
                // error in saving model
            }
        }




//        return $this->render('_form', [
//                    'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $oldFile = $model->getImageFile();
        $oldAvatar = $model->avatar;
        $oldFileName = $model->filename;

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadImage();

            // revert back if no valid file instance uploaded
            if ($image === false) {
                $model->avatar = $oldAvatar;
                $model->filename = $oldFileName;
            }

            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false && unlink($oldFile)) { // delete old and overwrite
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                // return $this->redirect(['view', 'id' => $model->_id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
//        $m = \app\modules\corn\models\Image::find()->where(['germplasm_id'=>intval($id)])->one();
//       \ChromePhp::log( $m);
//        $gid=$m->$id;
//        \ChromePhp::log('gid:');
//        \ChromePhp::log($gid);
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception 
        // e.g. display an error message 
        if ($model->delete()) {
            if (!$model->deleteImage()) {
                Yii::$app->session->setFlash('error', 'Error deleting image');
            }
        }
        return $this->redirect(['corn/view', 'id' => $model->_id]);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        \ChromePhp::log($id);
        if (($model = \app\modules\corn\models\Image::findOne(['germplasm_id' => intval($id)])) !== null) {

            return $model;
        } else {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    }

}
