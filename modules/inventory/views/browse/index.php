<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventory\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add to Inventory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'accession_no',
            'lot_no',
            'store_location',
            'packets_active_no',
            'packets_base_no',
            'seed_weight_active',
            'seed_weight_base',
            // 'date',
            // 'seedref_no',
            // 'store_location_base',
            // 'remarks:ntext',
            // 'date_of_harvest',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
