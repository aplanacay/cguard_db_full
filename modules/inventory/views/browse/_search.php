<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\InventorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'accession_no') ?>

    <?= $form->field($model, 'store_location') ?>

    <?= $form->field($model, 'packets_active_no') ?>

    <?= $form->field($model, 'packets_base_no') ?>

    <?= $form->field($model, 'seed_weight_active') ?>

    <?php // echo $form->field($model, 'seed_weight_base') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'seedref_no') ?>

    <?php // echo $form->field($model, 'lot_no') ?>

    <?php // echo $form->field($model, 'store_location_base') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'date_of_harvest') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
