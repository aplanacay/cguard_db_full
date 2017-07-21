<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\RegistrationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'reg_id') ?>

    <?= $form->field($model, 'cguard_no') ?>

    <?= $form->field($model, 'region_no') ?>

    <?= $form->field($model, 'region_name') ?>

    <?= $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'variety') ?>

    <?php // echo $form->field($model, 'date_received') ?>

    <?php // echo $form->field($model, 'sample_type') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'apn_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
