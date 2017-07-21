<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin([
                // 'layout' => 'horizontal',
                'fieldConfig' => [
                    //'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    /*'horizontalCssClasses' => [
                        ['label' => 'col-sm-6',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-6',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],*/
                ],
    ]); ?>

    <?= $form->field($model, 'cguard_no')->textInput() ?>

    <?= $form->field($model, 'region_no')->textInput() ?>

    <?= $form->field($model, 'region_name')->textInput() ?>

    <?= $form->field($model, 'province')->textInput() ?>

    <?= $form->field($model, 'variety')->textInput() ?>

    <?= $form->field($model, 'date_received')->textInput() ?>

    <?= $form->field($model, 'sample_type')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput() ?>

    <?= $form->field($model, 'apn_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
