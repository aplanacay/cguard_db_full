<?php

namespace app\modules\guest\controllers;

use yii\web\Controller;
use \yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use ChromePhp;
use Yii;

class ViewController extends Controller {

    public function actionEvaluation($id = null) {
        \Yii::$app->session->set('curr_page', 'guest-evaluation');
        $data = Yii::$app->request->get('Germplasm');
        $search = false;
        if (isset($data)) {
            foreach ($data as $key => $val) {
                if (!empty($val)) {
                    $search = true;
                    break;
                }
            }
        }


        $phl_no_str = "'(^[0-9]+)'";
        $phl_no_str2 = "'([^0-9_].*)'";
        \ChromePhp::log('here');
        \ChromePhp::log(Yii::$app->request->get());
        $searchModel = new \app\modules\corn\models\GermplasmSearch();

        $query = $searchModel->search(Yii::$app->request->get(), \app\modules\corn\models\Germplasm::find()->select(['germplasm.*'])->groupBy('phl_no,id,creator_id')->orderBy("(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})"));

        $model = $query->one();
        //ChromePhp::log($model);
        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 1]);

        $model = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->one();

        // $searchModel = new CharacterizationSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
            'pagination' => $pages,
        ]);


        return $this->render('evaluation', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'id' => $model->id
        ]);
    }

    public function actionIndex($id = null) {
        \Yii::$app->session->set('curr_page', 'guest-view');
        $data = Yii::$app->request->get();
        //ChromePhp::log($data['GermplasmSearch']);
        $search = false;
        if (isset($data)) {
            foreach ($data as $key => $val) {
                if (!empty($val)) {
                    $search = true;
                    break;
                }
            }
        }

        $phl_no_str = "'(^[0-9]+)'";
        $phl_no_str2 = "'([^0-9_].*)'";

        $searchModel = new \app\modules\corn\models\GermplasmSearch();

        $query = $searchModel->search(Yii::$app->request->get());

        $model = $query->one();
        //ChromePhp::log($model);
        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 1]);

        $model = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->one();

        // $searchModel = new CharacterizationSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
            'pagination' => $pages,
        ]);

        $characterizationSearchModel = new \app\modules\corn\models\CharacterizationSearch();
        if (!is_null($model)) {
            $characterizationQuery = $characterizationSearchModel->search(['CharacterizationSearch' => ['germplasm_id' => $model->id]]);
        } else {
            $characterizationQuery = $characterizationSearchModel->search(['CharacterizationSearch' => null]);
        }

        $countQueryCharacterization = clone $characterizationQuery;

        $pagesCharacterization = new \yii\data\Pagination(['totalCount' => $countQueryCharacterization->count(), 'pageSize' => 1]);

        $modelCharacterization = $characterizationQuery->offset($pagesCharacterization->offset)
                ->limit($pagesCharacterization->limit)
                ->one();
        $dataProviderCharacterization = new ActiveDataProvider([
            'query' => $modelCharacterization,
            //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
            'pagination' => $pagesCharacterization,
        ]);
//        }
//        return $this->render('index', [
//                    'characterizationQuery' => $modelCharacterization,
//                    'model' => $model,
//                    'dataProvider' => $dataProvider,
//                    'searchModel' => $searchModel,
//                    'id' => $id
//                        //  'columns' => $this->prepareDataProvider($columns),
//        ]);
        return $this->render('index', [
                    'characterizationQuery' => $modelCharacterization,
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'dataProviderCharacterization' => $dataProviderCharacterization,
                    'searchModel' => $searchModel,
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
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index', 'id' => $model->id]);
        } else {

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
    protected function findModel($id) {
        if (($model = \app\models\GermplasmBase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCharData($id) {
        \Yii::$app->session->set('curr_page', 'guest-browse');
        $query = \app\modules\corn\models\Germplasm::find();

//        $model = \app\modules\corn\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();

        $model = \app\modules\corn\models\Germplasm::findOne($id); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        // $columns =\app\modules\corn\models\Germplasm::find()->where(["id" => $id])->all();

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
        \Yii::$app->session->set('curr_page', 'guest-browse');
        $query = \app\modules\corn\models\Germplasm::find();

//        $model = \app\modules\corn\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();

        $model = \app\modules\corn\models\Germplasm::findOne($id); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        // $columns =\app\modules\corn\models\Germplasm::find()->where(["id" => $id])->all();

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
