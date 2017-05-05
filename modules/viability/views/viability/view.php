<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\viability\models\viability */

$this->title = $model->viabilityref_no;
$this->params['breadcrumbs'][] = ['label' => 'Viabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viability-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Viability Page', ['/viability/viability/'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->viabilityref_no], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->viabilityref_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'viabilityref_no:ntext',
            'collection_id:ntext',
            'cropping_season:ntext',
            'date_tested',
            'percentage',
            'date_packed',
            'remarks:ntext',
        ],
    ]) ?>

</div>
