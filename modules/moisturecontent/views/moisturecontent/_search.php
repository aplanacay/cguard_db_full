<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\moisturecontent\models\MoisturecontentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moisturecontent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mcref_no') ?>

    <?= $form->field($model, 'collection_id') ?>

    <?= $form->field($model, 'cropping_season') ?>

    <?= $form->field($model, 'date_tested') ?>

    <?= $form->field($model, 'percentage') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
