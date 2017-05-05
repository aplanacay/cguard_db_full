<?php

namespace app\modules\moisturecontent\controllers;

use Yii;
use app\modules\moisturecontent\models\moisturecontent;
use app\modules\moisturecontent\models\MoisturecontentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MoisturecontentController implements the CRUD actions for moisturecontent model.
 */
class MoisturecontentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all moisturecontent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MoisturecontentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single moisturecontent model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new moisturecontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new moisturecontent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mcref_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing moisturecontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mcref_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing moisturecontent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function downloadFile($fullpath){
      if(!empty($fullpath)){ 
          header("Content-type:application/doc"); //for pdf file
          //header('Content-Type:text/plain; charset=ISO-8859-15'); //if you want to read text file using text/plain header 
          header('Content-Disposition: attachment; filename="'.basename($fullpath).'"'); 
          header('Content-Length: ' . filesize($fullpath));
          readfile($fullpath);
          //Yii::app()->end();
      }else{
        echo "File not found!";
      }
    }

    public function actionDownload1(){
      $path = Yii::getAlias('@webroot')."/MATERIALTRANSFERAGREEMENNPGR.doc";
      //echo $path;
      $this->downloadFile($path);
    }

    public function actionDownload2(){
      $path = Yii::getAlias('@webroot')."/STANDARDMATERIALTRANSFERAGREEMENTDoc.doc";
      //echo $path;
      $this->downloadFile($path);
    }

    /**
     * Finds the moisturecontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return moisturecontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = moisturecontent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
