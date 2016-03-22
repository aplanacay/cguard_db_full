<?php

use kartik\helpers\Html; // or yii\helpers\Html
use kartik\widgets\ActiveForm; // or yii\widgets\ActiveForm
use kartik\widgets\FileInput;

?>
<?php

$model = \app\modules\corn\models\Image::find()->where(['germplasm_id' => $id])->one();
ChromePhp::log($id);
if ($model !== null) {
    echo kartik\helpers\Html::img('@web/uploads/' . $model->avatar);
}  else {
echo 'No image to display.';    
}