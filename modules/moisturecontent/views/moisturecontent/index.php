<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\moisturecontent\models\MoisturecontentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Moisture Content Determination';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="moisturecontent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('MC Determination data entry', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Download MTA', ['download1'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Download SMTA', ['download2'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'mcref_no',
            'collection_id',
            'cropping_season',
            'date_tested',
            'percentage',
            'remarks',
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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mcref_no:ntext',
            'collection_id:ntext',
            'cropping_season:ntext',
            'date_tested',
            'percentage',
            // 'remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
