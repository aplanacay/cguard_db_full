<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

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
                'header' => 'Regeneration <br> Ref No',
                'attribute' => 'seedref_no',
            ],
            [
                'header' => 'Accession <br> No',
                'attribute' => 'accession_no',
            ],
            //'lot_no',
            [
                'header' => 'Store <br> Location',
                'attribute' => 'store_location',
            ],
            [
                'header' => 'Total No of Packets:<br>Active',
                'attribute' => 'packets_active_no',
                'contentOptions' => function($model){
                    if($model->packets_active_no <= 1){
                        return ['class' => 'danger'];
                    }else{
                        return [];
                    }
                }
            ],
            [
                'header' => 'Total No of Packets:<br>Base',
                'attribute' => 'packets_base_no',
                'contentOptions' => function($model){
                    if($model->packets_base_no <= 1){
                        return ['class' => 'danger'];
                    }else{
                        return [];
                    }
                }
            ],
            [
                'header' => 'Estimated Total <br> Seed Weight: Active',
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
                'header' => 'Estimated Total <br> Seed Weight: Base',
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
                'header' => 'Date  of Storage<br>(YYYY-MM-DD)',
                'attribute' => 'date',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
                'header'=>'Actions',
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
