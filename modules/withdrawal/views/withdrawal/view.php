<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\withdrawal\models\Withdrawal */

$this->title = $model->seed_ref_no;
$this->params['breadcrumbs'][] = ['label' => 'Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdrawal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Withdrawal', ['/withdrawal/withdrawal'], ['class'=>'btn btn-primary']) ?>
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
            ['attribute'=>'type','value' => $model->type == 1 ? 'Active' : 'Base'],
            'amount',
            ['attribute'=>'purpose','value' => $model->purpose == 1 ? 'Distribution' : 'Monitoring'],
        ], 
    ]) ?>

</div>
