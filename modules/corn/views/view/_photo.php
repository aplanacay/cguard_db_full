<?php

use kartik\helpers\Html; // or yii\helpers\Html
use kartik\widgets\ActiveForm; // or yii\widgets\ActiveForm
use kartik\widgets\FileInput;

$model = \app\modules\corn\models\Image::find()->where(['germplasm_id' => $id])->one();
ChromePhp::log($model);
if ($model !== null) {

}else{
 $model = new \app\modules\corn\models\Image();
}
$form = ActiveForm::begin([
            'action' => ['upload/image?id=' . $id],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data'] // important
        ]);
//echo $form->field($model, 'filename');
// display the image uploaded or show a placeholder
// you can also use this code below in your `view.php` file
//$title = isset($model->filename) && !empty($model->filename) ? $model->filename : 'Avatar';
//echo Html::img($model->getImageUrl(), [
//    'class' => 'img-thumbnail',
//    'alt' => $title,
//    'title' => $title
//]);
// your fileinput widget for single file upload
echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png']
    ]
]);

/**
 * uncomment for multiple file upload
  echo $form->field($model, 'image[]')->widget(FileInput::classname(), [
  'options'=>['accept'=>'image/*', 'multiple'=>true],
  'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
  ]);
 */
//render the submit button
//echo Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', [
//    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
//);
////// render a delete image button 
//if (!$model->isNewRecord) {
//    echo Html::a('Delete', ['upload/delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
//}

ActiveForm::end();
?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$model = \app\modules\corn\models\Image::find()->where(['germplasm_id' => $id])->one();
ChromePhp::log($model);
if ($model !== null) {
    echo kartik\helpers\Html::img('@web/uploads/' . $model->avatar);
}