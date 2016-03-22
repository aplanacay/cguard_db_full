
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
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-right: 10px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
<!--  <div id="div-id-success-notif" class="alert alert-success"></div>-->

<?php


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use \kartik\widgets\Select2;
use yii\bootstrap\Modal;
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['browse/update?id=' . $id],
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
<div class = "form-group pull-right" >
    <?php echo Html::submitButton('Update', ['class' => 'btn btn-success']); ?>
    <?php
      echo \kartik\helpers\Html::button('<i class="glyphicon glyphicon-picture"></i> View Photo', [
                            //'value' => yii\helpers\Url::to('guest/browse/search'),
                            'data' => [
                                'toggle' => 'modal',
                                'target' => '#germplasm-photo-modal-id',
                            ],
                            'id' => 'search-btn-id',
                            'type' => 'button',
                            'title' => 'Advanced search',
                            'class' => 'btn btn-primary',
                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
                        ]).'&emsp;';
//    echo \kartik\helpers\Html::button('<i class="glyphicon glyphicon-picture"></i> View Photo', [
//                          //  'value' => yii\helpers\Url::to('guest/browse/search'),
//                            'data' => [
//                                'toggle' => 'modal',
//                                'target' => '#germplasm-photo-modal-id',
//                            ],
//                            'id' => 'view-photo-btn-id',
//                            'type' => 'button',
//                            'title' => 'Show photo',
//                            'class' => 'btn btn-primary',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]).'&emsp;';
//         echo '</div>';
         ?>
    <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
    <?php //echo Html::button('<span class=\'glyphicon glyphicon-plus\'></span> Expand all', ['class' => 'btn btn-primary', 'id' => 'collapse-init']); ?>

</div>
<br/>
<br/><br/>
<div class="panel-body passport-data" >
    <?php
    echo '<div class="col-md-4">';

    echo $form->field($model, 'phl_no')->textInput(['readonly' => true]);
    echo $form->field($model, 'variety_name')->textInput(['readonly' => true]);


    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'gb_no')->textInput(['readonly' => true]);

    echo $form->field($model, 'scientific_name')->textInput(['readonly' => true]);
    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'old_acc_no')->label('Old Accession No')->textInput(['readonly' => true]);
    echo '</div>';
    ?>
</div>
<hr></hr>
<?php
echo '<div class="col-md-4">';
echo $form->field($model->crop, 'name')->label('Crop group')->textInput(['readonly' => true]);

echo $form->field($model, 'dialect');

echo $form->field($model, 'grower');

echo $form->field($model, 'count_coll');

echo $form->field($model, 'prov');

echo $form->field($model, 'town');

echo $form->field($model, 'barangay');
echo $form->field($model, 'sitio');

echo $form->field($model, 'acq_date');
echo '</div><div class="col-md-4">';
echo $form->field($model, 'latitude');
//
echo $form->field($model, 'longitude');
//
echo $form->field($model, 'altitude');

echo $form->field($model, 'coll_source')->label('Collecting source')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['farmland' => 'farmland', 'backyard/ home garden' => 'backyard/ home garden', 'farm store/ threshing place' => 'farm store/ threshing place', 'village market' => 'village market', 'commercial seed shop' => 'commercial seed shop', 'agricultural institute' => 'agricultural institute', 'bordering field' => 'bordering field', 'natural vagetation/ wild' => 'natural vagetation/ wild', 'others' => 'others'],
    'options' => ['placeholder' => 'Select collecting source...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'value' => strtolower($model->coll_source),
]);

echo $form->field($model, 'gen_stat')->label('Genetic status')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['single plant' => 'single plant', 'pure line/ clone' => 'pure line/ clone', 'mixture/ population (clone/ pure line)' => 'mixture/ population (clone/ pure line)', 'open pollinated' => 'open pollinated', 'others' => 'others',],
    'options' => ['placeholder' => 'Select sampling type...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'sam_type')->label('Sample type')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['single plant' => 'single plant', 'pure line/ clone' => 'pure line/ clone', 'mixture/ population (clone/ pure line)' => 'mixture/ population (clone/ pure line)', 'open pollinated' => 'open pollinated', 'others' => 'others',],
    'options' => ['placeholder' => 'Select sampling type...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'sam_met')->label('Sampling methods')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['seed' => 'seed', 'fruit' => 'fruit', 'pod' => 'pod', 'others' => 'others'],
    'options' => ['placeholder' => 'Select sampling method...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'mat')->label('Material collected')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['seed' => 'seed', 'fruit' => 'fruit', 'pod' => 'pod', 'others' => 'others'],
    'options' => ['placeholder' => 'Select material collected...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
echo '</div><div class="col-md-4">';
echo $form->field($model, 'topo')->label('Topography')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['swamp' => 'swamp', 'food plain' => 'food plain', 'level plain' => 'level plain', 'undulating' => 'undulating', 'hilly' => 'hilly', 'mountainous' => 'mountainous', 'others' => 'others'],
    'options' => ['placeholder' => 'Select topography...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'site')->label('Soil texture')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['level' => 'level', 'slope' => 'slope', 'plateau' => 'plateau', 'depression' => 'depression', 'others' => 'others'],
    'options' => ['placeholder' => 'Select site...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'soil_tex')->label('Soil texture')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['sand' => 'sand', 'sandy loam' => 'sandy loam', 'loam' => 'loam', 'clay loam' => 'clay loam', 'silt' => 'silt', 'clay' => 'clay', 'highly organic (peat/muck)' => 'highly organic (peat/muck)', 'others' => 'others'],
    'options' => ['placeholder' => 'Select soil texture...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'drain')->label('Drainage')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['black' => 'black', 'dark brown' => 'dark brown', 'light brown' => 'light brown', 'grey' => 'grey', 'yellow' => 'yellow', 'red' => 'red', 'other' => 'other'],
    'options' => ['placeholder' => 'Select drainage...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'soil_col')->label('Soil color')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['poor' => 'poor', 'moderate' => 'moderate', 'good' => 'good', 'excessive' => 'excessive',],
    'options' => ['placeholder' => 'Select soil color...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo $form->field($model, 'ston')->label('Stoniness')->widget(\kartik\widgets\Select2::classname(), [
    'data' => ['none' => 'none', 'low' => 'low', 'medium' => 'medium', 'rocky' => 'rocky',],
    'options' => ['placeholder' => 'Select stoniness...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
echo '</div>';
?>


<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br>

<br>
<?php
ActiveForm::end();
?>

 