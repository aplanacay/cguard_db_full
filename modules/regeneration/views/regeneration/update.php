<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\regeneration\models\Regeneration */

$this->title = 'Update Regeneration: ' . ' ' . $model->seed_ref_no;
$this->params['breadcrumbs'][] = ['label' => 'Regeneration Record', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lot_no, 'url' => ['view', 'id' => $model->lot_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regeneration-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    	<?= Html::a('Back to Regeneration', ['/regeneration/regeneration'], ['class'=>'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
