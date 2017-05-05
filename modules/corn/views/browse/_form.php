

<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 12px; 
        line-height: 1.42857143;
        color: #333;
        background-color: #fff;
    }
    .select2-container--krajee .select2-selection--single {
        height: 30px;
        line-height: 1.42857143;
        padding: 6px 24px 6px 12px;
    }
    .select2-container--krajee .select2-selection--single .select2-selection__arrow {
        border: none;
        border-left: 1px solid #aaa;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        position: absolute;
        height: 28px;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container--krajee .select2-selection {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555555;
        font-size: 12px;
        outline: 0;
    }
    .col-sm-4, .col-md-4,  .col-sm-6 {
        position: relative;
        min-height: 1px;
        //padding-right: 0px; 
        padding-left: 10px;
    }
    .col-sm-6 {
        width: 68%;
        // background-color:#8BC34A;
    }
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #fff; 
        opacity: 1;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 30px;
        padding: 6px 12px;
        font-size: 12px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 0px; 
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-group {
        margin-bottom: 5px;
    }
    .form-horizontal .control-label {
        padding-top: 6px;
        margin-bottom: 0;
        text-align: right;
    }
    .passport-data{
        background-color:#009688;
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 0px 0;
        border-radius: 4px;
    }
</style>
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GermplasmBase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="germplasm-base-form">

    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        ['label' => 'col-sm-6',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-6',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
                ],
    ]);
    ?>
    <div class="panel-body " >
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'phl_no')->textInput();
            echo $form->field($model, 'variety_name')->textInput();
            ?>
        </div><div class="col-md-4">
            <?php
            echo $form->field($model, 'gb_no')->textInput();
            echo $form->field($model, 'scientific_name')->textInput();
            ?>
        </div><div class="col-md-4">
            <?php
            echo $form->field($model, 'old_acc_no')->textInput();
            echo $form->field($model, 'other_number')->textInput();
            ?>
        </div>
    </div>
    <hr></hr>
    <div class="col-md-4">
        <?php
        echo $form->field($model, 'dialect')->textInput();

        echo $form->field($model, 'grower')->textInput();

        echo $form->field($model, 'collecting_no')->textInput();

        echo $form->field($model, 'count_coll')->textInput();

        echo $form->field($model, 'prov')->textInput();

        echo $form->field($model, 'town')->textInput();

        echo $form->field($model, 'barangay')->textInput();

        echo $form->field($model, 'sitio')->textInput();
        ?>
    </div><div class="col-md-4">
        <?php
        echo $form->field($model, 'acq_date')->textInput();

        echo $form->field($model, 'latitude')->textInput();

        echo $form->field($model, 'longitude')->textInput();

        echo $form->field($model, 'altitude')->textInput();
        ?>
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
        ?>
    </div><div class="col-md-4">
        <?php
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
        echo $form->field($model, 'remarks')->textarea(['rows' => 6]);
        ?>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>