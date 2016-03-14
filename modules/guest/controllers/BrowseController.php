<?php

namespace app\modules\guest\controllers;

use yii\web\Controller;
use \yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use ChromePhp;
use Yii;

class BrowseController extends Controller {

    public function actionSearch() {
        return $this->render('search/modal');
    }

    public function actionIndex() {
        \Yii::$app->session->set('curr_page', 'guest-browse');
        // $query = \app\modules\corn\models\Germplasm::find()->orderBy( "(substring(phl_no,"."'^[0-9]+'"."))::int".",substring(phl_no,"."'[^0-9_].*$'".")");\
        $searchModel = new \app\modules\corn\models\GermplasmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $phl_no_str = "'(^[0-9]+)'";
        $phl_no_str2 = "'([^0-9_].*)'";

        $model = \app\modules\corn\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)');
        $dataProvider = new ActiveDataProvider([
            'query' => $dataProvider,
            'sort' => [
                'defaultOrder' => ['phl_no' => SORT_ASC],
                'attributes' => [
                    'phl_no' => [
                        'asc' => ["(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})" => SORT_ASC],
                        'desc' => ["(substring(phl_no, {$phl_no_str}))::int" => SORT_DESC],
                        'default' => '(substring(phl_no, ' . $phl_no_str . '))::int, substring(phl_no, ' . $phl_no_str2 . ') ASC',
                    ],
                    'creation_timestamp', 'modification_timestamp', 'remarks', 'Notes', 'old_acc_no', 'gb_no', 'collecting_no', 'variety_name', 'dialect', 'grower', 'scientific_name', 'count_coll', 'prov', 'town', 'barangay', 'sitio', 'acq_date', 'latitude', 'longitude', 'altitude', 'coll_source', 'gen_stat', 'sam_type', 'sam_met', 'mat', 'topo', 'site', 'soil_tex', 'drain', 'soil_col', 'ston'
                ]]
        ]);

        $model = $model->with('attributes');

        $columns = $model->asArray()->all();

        return $this->render('index', [
                    // 'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                        // 'columns' => $this->prepareDataProvider($columns),
        ]);
    }

    public function prepareDataProvider($model) {

        //$columns = array();
        $columns = array(
            array(
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
//                'buttons'=>[
//                        'today_action' => function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, 
//                        [
//                            'title' => Yii::t('app', 'Change today\'s lists'),
//                        ]);
//                    }
//                ],
                'dropdown' => false,
                'urlCreator' => function($action, $model, $key, $index) {
            if ($action === 'view') {
                return \yii\helpers\Url::to(['/corn/view/index', 'id' => $model->id]);
            }
        },
                'viewOptions' => ['title' => 'View more information', 'data-toggle' => 'tooltip'],
//                'updateOptions' => ['title' => 'updateMsg', 'data-toggle' => 'tooltip'],
//                'deleteOptions' => ['title' => 'deleteMsg', 'data-toggle' => 'tooltip'],
                'order' => \kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT),
//            array(
//                'attribute' => 'id',
//                'vAlign' => 'middle',
//                'width' => '250px',
//                'value' => function ($model, $key, $index, $widget) {
////            return Html::a($model->author->name, '#', [
////                'title'=>'View author detail', 
////                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////            ]);
//
//            return $model->id;
//        },
//            ),
            array(
                'attribute' => 'phl_no',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->phl_no;
        },
//                 'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\modules\corn\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
            ),
            array(
                'attribute' => 'old_acc_no',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->old_acc_no;
        },
//                 'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\modules\corn\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
            ),
            array(
                'attribute' => 'gb_no',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->gb_no;
        },
//                 'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\modules\corn\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
            ),
            array(
                'attribute' => 'crop',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->crop->name;
        },
//                 'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\modules\corn\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
            ),
            array(
                //'header' => 'Local/ Variety Name',
                'attribute' => 'variety_name',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);
            return $model->variety_name;
        },
//                 'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\modules\corn\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
            ),
            array(
                'attribute' => 'count_coll',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->count_coll;
        },
            ),
            array(
                'attribute' => 'prov',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->prov;
        },
            ),
            array(
                'attribute' => 'town',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->town;
        },
            ),
        );


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

    /**
     * Creates a new GermplasmBase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        \ChromePhp::log('hello');
        $model = new \app\modules\corn\models\Germplasm();
        $model->load(Yii::$app->request->post());
        $model->setAttribute('crop_id', 1);
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAdd() {
        $model = new \app\modules\corn\models\Germplasm();

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

}
