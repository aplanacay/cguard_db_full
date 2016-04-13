<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    </p>

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
