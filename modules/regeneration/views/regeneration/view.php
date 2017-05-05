<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\inventory\models\Inventory;
/* @var $this yii\web\View */
/* @var $model app\modules\regeneration\models\Regeneration */

$this->title = $model->seed_ref_no;
$this->params['breadcrumbs'][] = ['label' => 'Regeneration Record', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regeneration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Regeneration', ['/regeneration/regeneration'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->lot_no], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lot_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete ' . $model->seed_ref_no . '?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'seed_ref_no:ntext',
            'accession_no:ntext',
            'lot_no',
            'date',
            ['attribute'=>'type', 'value' => $model->type >= 2 ? ($model->type >= 3 ? 'Active and Base' : 'Base') : 'Active'],  
            ['attribute'=>'amount', 'value' => $model->type > 2 ? ($model->type >= 3 ? $model->amount/2 : $model->amount) : $model->amount],
            //'amount', //original
        ], 
    ]) ?>

</div>
