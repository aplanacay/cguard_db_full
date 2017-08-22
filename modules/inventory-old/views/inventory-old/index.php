<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventory\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add to Inventory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'seedref_no',
            'accession_no',
            'store_location',
            'packets_active_no',
            'packets_base_no',
            'seed_weight_active',
            'seed_weight_base',
            'date',
            //['class' => 'yii\grid\ActionColumn'],
        ];

        // Renders a export dropdown menu
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'dropdownOptions' => [
            'label' => 'Export All',
            'class' => 'btn btn-default',
            ],
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
                ExportMenu::FORMAT_HTML => false
            ]
        ]);
    ?>

    <hr>

    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'layout'=>"{pager}\n{summary}\n{items}",
        'pager' => [
            'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
            'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
            'nextPageLabel' => 'Next',   // Set the label for the "next" page button
            'firstPageLabel'=>'First',   // Set the label for the "first" page button
            'lastPageLabel'=>'Last',    // Set the label for the "last" page button
            'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
            'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
            'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
            'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
            'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        /*'rowOptions'=>function($model){
            if($model->packets_active_no <= 1){
                return ['class' => 'danger'];
            }else{
                return [];
            }
        },*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'REFERENCE <br> NO',
                'attribute' => 'seedref_no',
            ],
            [
                'header' => 'ACCESSION <br> NO',
                'attribute' => 'accession_no',
            ],
            //'lot_no',
            [
                'header' => 'STORE <br> LOCATION ACTIVE',
                'attribute' => 'store_location',
            ],
            // [ //original
            //     'header' => 'TOTAL NO OF PACKETS:<br>ACTIVE',
            //     'attribute' => 'packets_active_no',
            //     'contentOptions' => function($model){
            //         if($model->packets_active_no <= 1){
            //             return ['class' => 'danger'];
            //         }else{
            //             return [];
            //         }
            //     }
            // ],
            [
                'header' => 'ESTIMATED TOTAL <br> SEED WEIGHT: ACTIVE',
                'attribute' => 'seed_weight_active',
                'contentOptions' => function($model){
                    if($model->packets_active_no <= 1){
                        return ['class' => 'danger'];
                    }else{
                        return [];
                    }
                }
            ],
            [
                'header' => 'STORE <br> LOCATION BASE',
                'attribute' => 'store_location_base',
            ],
            // [ //original
            //     'header' => 'TOTAL NO OF PACKETS:<br>BASE',
            //     'attribute' => 'packets_base_no',
            //     'contentOptions' => function($model){
            //         if($model->packets_base_no <= 1){
            //             return ['class' => 'danger'];
            //         }else{
            //             return [];
            //         }
            //     }
            // ],
            [
                'header' => 'ESTIMATED TOTAL <br> SEED WEIGHT: BASE',
                'attribute' => 'seed_weight_base',
                'contentOptions' => function($model){
                    if($model->packets_base_no <= 1){
                        return ['class' => 'danger'];
                    }else{
                        return [];
                    }
                }
            ],
            [
                'header' => 'DATE OF HARVEST<br>(YYYY-MM-DD)',
                'attribute' => 'date_of_harvest',
            ],
            [
                'header' => 'DATE OF STORAGE<br>(YYYY-MM-DD)',
                'attribute' => 'date',
            ],
            [
                'header' => 'REMARKS',
                'attribute' => 'remarks',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
                'header'=>'Actions',
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
