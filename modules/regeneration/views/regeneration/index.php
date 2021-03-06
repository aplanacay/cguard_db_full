<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use app\modules\inventory\models\Inventory;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\regeneration\models\RegenerationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regeneration Record';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regeneration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regeneration', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'accession_no',
            'seed_si_ref_no',
            'seed_ref_no',
            'lot_no',
            'date',
            'type',
            'amount',
            //['class' => 'yii\grid\ActionColumn'],
        ];
        // Renders a export dropdown menu
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'dropdownOptions' => [
            'label' => 'Export All',
            'class' => 'btn btn-default'
            ],
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
                ExportMenu::FORMAT_HTML => false
            ]
        ]);
    ?>

    <hr>

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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'accession_no:ntext',
            //'lot_no',
            //'seed_ref_no:ntext',
            'date',
            [
                'attribute' => 'type',
                'value' => function($model) {
                    //return $model->type == 1 ? 'Active' : 'Base';
                    if($model->type == 1) return 'Active';
                    elseif($model->type == 2) return 'Base';
                    else return 'Active and Base';
                }
            ],
            //'amount' //original
            [
                'attribute' => 'amount',
                'value' => function($model) {
                    //return $model->type == 1 ? 'Active' : 'Base';
                    if($model->type == 1) return $model->amount;
                    elseif($model->type == 2) return $model->amount;
                    else return $model->amount/2;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
                'header'=>'Actions',
            ],
        ],
    ]); ?>

</div>
