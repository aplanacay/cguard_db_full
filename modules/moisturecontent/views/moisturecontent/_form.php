<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\moisturecontent\models\moisturecontent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moisturecontent-form">

    <?php $form = ActiveForm::begin([
        //'fieldConfig' => ['template' => '{label} <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>',]
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            ],
    ]); ?>

    <?= $form->field($model, 'mcref_no')->textInput() ?>
    <?= $form->field($model, 'collection_id')->textInput() ?>
    <?= $form->field($model, 'seedref_no')->textInput() ?>
    <?= $form->field($model, 'cropping_season')->textInput() ?>

    <?= DatePicker::widget([
            'model' => $model,
            'form' => $form,
            'attribute' => 'date_tested',
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Enter date tested'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'todayHighlight' => true,
                'autoclose'=>true
            ]
        ]); 
    ?>

    <?= $form->field($model, 'percentage')->textInput() ?>
    <?= $form->field($model, 'remarks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
