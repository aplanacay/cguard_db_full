<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
