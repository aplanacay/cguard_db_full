<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\Inventory */

$this->title = $model->seedref_no;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Inventory', ['/inventory/inventory'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->lot_no], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lot_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete '. $model->seedref_no . '?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'accession_no',
            'seedref_no',
            'lot_no',
            'store_location:ntext',
            'packets_active_no',
            'packets_base_no',
            'seed_weight_active',
            'seed_weight_base',
            'date_of_harvest',
            'date',
            'remarks',
        ],
    ]) ?>


</div>
