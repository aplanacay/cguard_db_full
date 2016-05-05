<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\viability\models\viability */

$this->title = 'Update Viability: ' . ' ' . $model->viabilityref_no;
$this->params['breadcrumbs'][] = ['label' => 'Viabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->viabilityref_no, 'url' => ['view', 'id' => $model->viabilityref_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="viability-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
