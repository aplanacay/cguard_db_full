<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\withdrawal\models\Withdrawal */

$this->title = 'Update Withdrawal: ' . ' ' . $model->seed_ref_no;
$this->params['breadcrumbs'][] = ['label' => 'Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lot_no, 'url' => ['view', 'id' => $model->lot_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="withdrawal-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    	<?= Html::a('Back to Withdrawal', ['/withdrawal/withdrawal'], ['class'=>'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
