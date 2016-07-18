<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\viability\models\ViabilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Viability Testing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viability-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Viability data entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'viabilityref_no',
            'collection_id',
            'cropping_season',
            'date_tested',
            'percentage',
            'date_packed',
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

            'viabilityref_no:ntext',
            'collection_id:ntext',
            'cropping_season:ntext',
            'date_tested',
            'percentage',
            // 'date_packed',
            // 'remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
