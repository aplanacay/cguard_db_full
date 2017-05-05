<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => 'true',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'seedref_no')->textInput() ?>
    <?= $form->field($model, 'accession_no')->textInput() ?>
    <?= $form->field($model, 'store_location')->textInput() ?>
    <?= $form->field($model, 'store_location_base')->textInput() ?>
    <?= $form->field($model, 'packets_active_no')->textInput(['id' => 'pan']) ?>
    <?= $form->field($model, 'packets_base_no')->textInput(['id' => 'pbn']) ?>
    <?= $form->field($model, 'seed_weight_active')->textInput(['id' => 'swa', 'readonly' => true]) ?>
    <?= $form->field($model, 'seed_weight_base')->textInput(['id' => 'swb', 'readonly' => true]) ?>
    <?= DatePicker::widget([
            'model' => $model,
            'form' => $form,
            'attribute' => 'date',
            'value' => date('M-d-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Enter date'],
            'pluginOptions' => [
                'format' => 'M-dd-yyyy',
                'todayHighlight' => true,
                'autoclose'=>true
            ]
        ]); 
    ?>
    <?= DatePicker::widget([
            'model' => $model,
            'form' => $form,
            'attribute' => 'date_of_harvest',
            'value' => date('M-d-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Enter date'],
            'pluginOptions' => [
                'format' => 'M-dd-yyyy',
                'todayHighlight' => true,
                'autoclose'=>true
            ]
        ]); 
    ?>
    <?= $form->field($model, 'remarks')->textInput() ?>

    <?php
        $this->registerJs("$('#pan, #pbn').keyup(function(){
                var rateA = $('#pan').val();
                var rateB = $('#pbn').val();
                var weightA = rateA * 35;
                var weightB = rateB * 35;
                $('#swa').val(weightA);
                $('#swb').val(weightB);
        });"); 
    ?>

    <div> <!--class="form-group"-->
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
