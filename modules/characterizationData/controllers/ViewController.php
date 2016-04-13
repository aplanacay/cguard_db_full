<?php

namespace app\modules\characterizationData\controllers;

use yii\web\Controller;
use \yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use ChromePhp;
use Yii;

class ViewController extends Controller {

    public function actionIndex() {
        \Yii::$app->session->set('curr_page', 'characterization-data-browse');
        $query = \app\modules\catalog\models\Germplasm::find();
        if (isset($_GET['id'])) {
            $model = \app\modules\catalog\models\Germplasm::find()->where(['is_void' => false, 'id' => $_GET['id']])->orderBy('id')->groupBy('id')->one(); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        } else {
            $model = \app\modules\catalog\models\Germplasm::find()->where(['is_void' => false])->orderBy('id')->groupBy('id')->one(); //->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
        }
         $countQuery = clone $query;

         $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(),'pageSize' => 1]);

        $model = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->one();

//        $model = \app\modules\catalog\models\GermplasmAttribute::find()->select('distinct(germplasm_attribute.variable_id)')->where(['id' => $id]);
//        $model = $model->with('attributes');
//        $columns = $model->asArray()->all();
        // $columns =\app\modules\catalog\models\Germplasm::find()->where(["id" => $id])->all();



        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
            'pagination'=>$pages
        ]);



        return $this->render('index', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                        // 'id' => $id
                        //  'columns' => $this->prepareDataProvider($columns),
        ]);
    }

    public function actionCharData($id) {
        \Yii::$app->session->set('curr_page', 'characterization-data');
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
        \Yii::$app->session->set('curr_page', 'characterization-data');
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
            'cultivar/variety_name/pedigree',
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
