
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;

    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

</style>
<?php

use yii\widgets\ActiveForm;
?>
<?php
if (\Yii::$app->session->hasFlash('success') === true) {
    echo '<br><br><br>';
    echo kartik\alert\Alert::widget([
        'type' => kartik\alert\Alert::TYPE_SUCCESS,
        'title' => 'successfully uploaded the file.',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => \Yii::$app->session->getFlash('success'),
        'showSeparator' => true,
            // 'delay' => 2000
    ]);
} if (\Yii::$app->session->hasFlash('error') === true) {
    echo '<br><br><br>';
    echo kartik\alert\Alert::widget([
        'type' => kartik\alert\Alert::TYPE_DANGER,
        'title' => 'Failed to upload file.',
        'icon' => 'glyphicon glyphicon-remove-sign',
        'body' => \Yii::$app->session->getFlash('error'),
        'showSeparator' => true,
            // 'delay' => 2000
    ]);
}
?>

<br><br>
<br><br>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end() ?>
