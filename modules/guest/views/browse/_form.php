<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GermplasmBase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="germplasm-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phl_no')->textInput() ?>
    <?= $form->field($model, 'old_acc_no')->textInput() ?>

    <?= $form->field($model, 'gb_no')->textInput() ?>

    <?= $form->field($model, 'collecting_no')->textInput() ?>

    <?= $form->field($model, 'variety_name')->textInput() ?>

    <?= $form->field($model, 'dialect')->textInput() ?>

    <?= $form->field($model, 'grower')->textInput() ?>

    <?= $form->field($model, 'scientific_name')->textInput() ?>

    <?= $form->field($model, 'count_coll')->textInput() ?>

    <?= $form->field($model, 'prov')->textInput() ?>

    

    <?= $form->field($model, 'acq_date')->textInput() ?>

    
    <?php

    use kartik\widgets\Select2;

echo $form->field($model, 'coll_source')->widget(Select2::classname(), [
        'data' => ['farmland' => 'farmland', 'backyard/ home garden' => 'backyard/ home garden', 'farm store/ threshing place' => 'farm store/ threshing place', 'village market' => 'village market', 'commercial seed shop' => 'commercial seed shop', 'agricultural institute' => 'agricultural institute', 'bordering field' => 'bordering field', 'natural vagetation/ wild' => 'natural vagetation/ wild', 'others' => 'others'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    echo $form->field($model, 'sam_type')->widget(Select2::classname(), [
        'data' => ['single plant' => 'single plant', 'pure line/ clone' => 'pure line/ clone', 'mixture/ population (clone/ pure line)' => 'mixture/ population (clone/ pure line)', 'open pollinated' => 'open pollinated', 'others' => 'others',],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);

    echo $form->field($model, 'sam_met')->widget(Select2::classname(), [
        'data' => ['random' => 'random', 'non-random' => 'non-random',],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'mat')->widget(Select2::classname(), [
        'data' => ['seed' => 'seed', 'fruit' => 'fruit', 'pod' => 'pod', 'others' => 'others'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'topo')->widget(Select2::classname(), [
        'data' => ['swamp' => 'swamp', 'food plain' => 'food plain', 'level plain' => 'level plain', 'undulating' => 'undulating', 'hilly' => 'hilly', 'mountainous' => 'mountainous', 'others' => 'others'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'site')->widget(Select2::classname(), [
        'data' => ['level' => 'level', 'slope' => 'slope', 'plateau' => 'plateau', 'depression' => 'depression', 'others' => 'others'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'soil_tex')->widget(Select2::classname(), [
        'data' => ['sand' => 'sand', 'sandy loam' => 'sandy loam', 'loam' => 'loam', 'clay loam' => 'clay loam', 'silt' => 'silt', 'clay' => 'clay', 'highly organic (peat/muck)' => 'highly organic (peat/muck)', 'others' => 'others'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'soil_col')->widget(Select2::classname(), [
        'data' => ['black' => 'black', 'dark brown' => 'dark brown', 'light brown' => 'light brown', 'grey' => 'grey', 'yellow' => 'yellow', 'red' => 'red', 'other' => 'other'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'drain')->widget(Select2::classname(), [
        'data' => ['poor' => 'poor', 'moderate' => 'moderate', 'good' => 'good', 'excessive' => 'excessive',],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    echo $form->field($model, 'ston')->widget(Select2::classname(), [
        'data' => ['none' => 'none', 'low' => 'low', 'medium' => 'medium', 'rocky' => 'rocky',],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
    ]);
    ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
