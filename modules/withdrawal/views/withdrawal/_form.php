<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\withdrawal\models\Withdrawal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="withdrawal-form">

    <?php $form = ActiveForm::begin([
        //'fieldConfig' => ['template' => '{label} <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>',]
        //'enableAjaxValidation' => 'true',
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

    <!--<?= $form->errorSummary($model); ?>-->

    <?= $form->field($model, 'seed_ref_no')->textInput(['readonly' => !$model->isNewRecord]) ?>
    <?= $form->field($model, 'seed_si_ref_no')->textInput(['readonly' => !$model->isNewRecord]) ?>
    <?= $form->field($model, 'accession_no')->textInput(['readonly' => !$model->isNewRecord]) ?>
    <?= DatePicker::widget([
            'model' => $model,
            'form' => $form,
            'attribute' => 'date',
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Enter date'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'todayHighlight' => true,
                'autoclose'=>true
            ]
        ]); 
    ?>
    <?= $form->field($model, 'type')->radioList([
        '1' => 'Active',
        '2' => 'Base',
    ]); ?>
    <?= $form->field($model, 'amount')->textInput() ?>
    <?= $form->field($model, 'purpose')->radioList([
        '1' => 'Distribution',
        '2' => 'Monitoring',
    ]); ?>

    <div> <!--class="form-group"-->
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
