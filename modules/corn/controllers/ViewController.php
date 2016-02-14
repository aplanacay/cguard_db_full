<?php

namespace app\modules\catalog\controllers;

use yii\web\Controller;
use \yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use ChromePhp;
use Yii;

class ViewController extends Controller {

    public function actionIndex($id) {
        \Yii::$app->session->set('curr_page', 'catalog-browse');
        //$query = \app\modules\catalog\models\Germplasm::find();
        $phl_no_str="'(^[0-9]+)'";
$phl_no_str2="'([^0-9_].*$)'";
        $query = \app\modules\catalog\models\Germplasm::find()->select(['germplasm.*'])->orderBy( "(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})");

//        $model = \app\modules\catalog\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();
        //\ChromePhp::log(\app\modules\catalog\models\Germplasm::find()->select(['germplasm.*'])->orderBy( "(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})")->limit(1)->asArray()->all());
        $model = \app\modules\catalog\models\Germplasm::findOne($id); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        // $columns =\app\modules\catalog\models\Germplasm::find()->where(["id" => $id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            ChromePhp::log(Yii::$app->request->post());
            // Yii::$app->session->setFlash('div-id-success-notif', 'Success Message');
            //return $this->redirect(['index', 'id' => $model->id]);
        }else{
            ChromePhp::log($model->getErrors());
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        
        return $this->render('index', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'id' => $id
                        //  'columns' => $this->prepareDataProvider($columns),
        ]);
    }
    
    /**
     * Updates an existing GermplasmBase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            ChromePhp::log(Yii::$app->request->post());
           return $this->redirect(['index', 'id' => $model->id]);
        } else {
            \ChromePhp::log($model->getErrors());
//            return $this->render('update', [
//                'model' => $model,
//            ]);
        }
    }
     /**
     * Finds the GermplasmBase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GermplasmBase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = \app\models\GermplasmBase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCharData($id) {
        \Yii::$app->session->set('curr_page', 'catalog-browse');
        $query = \app\modules\catalog\models\Germplasm::find();

//        $model = \app\modules\catalog\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();

        $model = \app\modules\catalog\models\Germplasm::findOne($id); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        // $columns =\app\modules\catalog\models\Germplasm::find()->where(["id" => $id])->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        $html = $this->renderPartial('characteristics_data', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'id' => $id,
                //  'columns' => $this->prepareDataProvider($columns),
        ]);
        return \yii\helpers\Json::encode($html);
    }

    public function actionVarietyName($id) {
        \Yii::$app->session->set('curr_page', 'catalog-browse');
        $query = \app\modules\catalog\models\Germplasm::find();

//        $model = \app\modules\catalog\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();

        $model = \app\modules\catalog\models\Germplasm::findOne($id); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        // $columns =\app\modules\catalog\models\Germplasm::find()->where(["id" => $id])->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        $html = $this->renderPartial('characteristics_data', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'id' => $id,
                //  'columns' => $this->prepareDataProvider($columns),
        ]);
        return \yii\helpers\Json::encode($html);
    }

    public function prepareDataProvider($model) {

        //$columns = array();
        $columns = [
            //'columns' => [
            //'id',
            'variety_name',
            'scientific_name',
                //  ],
//            'columns' => [
//                [
//                    'attribute' => 'cultivar/variety_name/pedigree',
//                    //'label' => 'Local Name',
//                    'displayOnly' => true,
//                    'valueColOptions' => ['style' => 'width:30%']
//                ],
//                
//            ],
//            'columns' => [
//                [
//                    'attribute' => 'scientific_name',
//                    //'label' => 'Taxonomy',
//                    'displayOnly' => true,
//                    'valueColOptions' => ['style' => 'width:30%']
//                ],
//                
//            ],
        ];

//        foreach ($model as $row) {
//            // echo '<br><br>';
//            $id = $row['attributes']['id'];
//            $columns[] = array(
//                'attribute' => $row['attributes']['abbrev'],
//                'vAlign' => 'middle',
//                'width' => '250px',
//                'noWrap' => true,
//                'value' => function ($model, $key, $index, $widget) use ($id) {
////            return Html::a($model->author->name, '#', [
////                'title'=>'View author detail', 
////                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////            ]);
//            foreach ($model->attributes as $att) {
//                //\ChromePhp::log($att['id']);
//                if (number_format($att['variable_id']) === number_format($id)) {
//                    return $att['value'];
//                }
//            }
//
//            //return $model->attributes[0]->id;
////            if ($model->attributes->id===$row['attributes']['id']) {
////                return $model->attributes->value;
////            } else {
////                return null;
////            }
//        },
////                'filterType' => GridView::FILTER_SELECT2,
////                'filter' => \app\models\GermplasmAttributeBase::find()->select('distinct(value),*')->where(['variable_id' => $id])->orderBy('germplasm_id')->asArray()->all(),
////                'filterWidgetOptions' => [
////                    'pluginOptions' => ['allowClear' => true],
////                ],
////                'filterInputOptions' => ['placeholder' => 'Any author'],
////                'format' => 'raw'
//            );
//        }
        // print_r($columns);

        return $columns;
    }

}
