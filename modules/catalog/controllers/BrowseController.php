<?php

namespace app\modules\catalog\controllers;

use yii\web\Controller;
use \yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use ChromePhp;

class BrowseController extends Controller {

    public function actionSearch() {
        return $this->render('search/modal');
    }

    public function actionIndex() {
        \Yii::$app->session->set('curr_page', 'catalog-browse');
        $query = \app\modules\catalog\models\Germplasm::find();

        $model = \app\modules\catalog\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)');
        $model = $model->with('attributes');
        $columns = $model->asArray()->all();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//         foreach($model as $row){
//            echo '<br>';
//            print_r($row['attributes']['abbrev']);
//        }
        return $this->render('index', [
                    // 'model' => $model,
                    'dataProvider' => $dataProvider,
                    'columns' => $this->prepareDataProvider($columns),
        ]);
    }

    public function prepareDataProvider($model) {

        //$columns = array();
        $columns = array(
            array('class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'urlCreator' => function($action, $model, $key, $index) {
            return '#';
        },
                'viewOptions' => ['title' => 'viewMsg', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'updateMsg', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'deleteMsg', 'data-toggle' => 'tooltip'],
                'order' => \kartik\dynagrid\DynaGrid::ORDER_FIX_RIGHT),
            array(
                'attribute' => 'id',
                'vAlign' => 'middle',
                'width' => '250px',
                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);

            return $model->id;
        },
            ),
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
//                'filter' => \app\modules\catalog\models\Germplasm::find()->orderBy('phl_no')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'phl no'],
//                'format' => 'raw'
        ));

        foreach ($model as $row) {
            // echo '<br><br>';
            $id = $row['attributes']['id'];
            $columns[] = array(
                'attribute' => $row['attributes']['abbrev'],
                'vAlign' => 'middle',
                'width' => '250px',
                'noWrap' => true,
                'value' => function ($model, $key, $index, $widget) use ($id) {
//            return Html::a($model->author->name, '#', [
//                'title'=>'View author detail', 
//                'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//            ]);
            foreach ($model->attributes as $att) {
                //\ChromePhp::log($att['id']);
                if (number_format($att['variable_id']) === number_format($id)) {
                    return $att['value'];
                }
            }

            //return $model->attributes[0]->id;
//            if ($model->attributes->id===$row['attributes']['id']) {
//                return $model->attributes->value;
//            } else {
//                return null;
//            }
        },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \app\models\GermplasmAttributeBase::find()->select('distinct(value),*')->where(['variable_id' => $id])->orderBy('germplasm_id')->asArray()->all(),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Any author'],
//                'format' => 'raw'
            );
        }
        // print_r($columns);

        return $columns;
    }

}
