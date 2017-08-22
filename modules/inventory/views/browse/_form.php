<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accession_no')->textInput() ?>

    <?= $form->field($model, 'store_location')->textInput() ?>

    <?= $form->field($model, 'packets_active_no')->textInput() ?>

    <?= $form->field($model, 'packets_base_no')->textInput() ?>

    <?= $form->field($model, 'seed_weight_active')->textInput() ?>

    <?= $form->field($model, 'seed_weight_base')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'seedref_no')->textInput() ?>

    <?= $form->field($model, 'store_location_base')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_of_harvest')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
