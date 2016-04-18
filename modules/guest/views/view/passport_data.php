
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
<!--  <div id="div-id-success-notif" class="alert alert-success"></div>-->

<?php

use yii\bootstrap\ActiveForm;

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
<div class = "form-group pull-right" >
    <?php
    echo \kartik\helpers\Html::button('<i class="glyphicon glyphicon-picture"></i> View Photo', [
        //'value' => yii\helpers\Url::to('guest/browse/search'),
        'data' => [
            'toggle' => 'modal',
            'target' => '#germplasm-photo-modal-id',
        ],
        'id' => 'image-btn-id',
        'type' => 'button',
        'title' => 'View photo',
        'class' => 'btn btn-primary',
            //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
    ]) . '&emsp;';
    ?>
</div>
<br><br><br>
<div class="panel-body passport-data" >
    <?php
    echo '<div class="col-md-4">';

    echo $form->field($model, 'phl_no')->textInput(['readonly' => true]);
    echo $form->field($model, 'variety_name')->textInput(['readonly' => true]);


    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'gb_no')->textInput(['readonly' => true]);

     echo $form->field($model, 'scientific_name', ['template' => "{label}<div class='col-sm-6'><i>{input}</i>{hint}{error}</div>",
    ])->textInput(['readonly' => true]);
    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'old_acc_no')->label('Old Accession No')->textInput(['readonly' => true]);
    echo '</div>';
    ?>
</div>
<hr></hr>
<?php
echo '<div class="col-md-4">';
echo $form->field($model->crop, 'name')->label('Crop group')->textInput(['readonly' => true]);

echo $form->field($model, 'dialect')->textInput(['readonly' => true]);

echo $form->field($model, 'grower')->textInput(['readonly' => true]);

echo $form->field($model, 'count_coll')->textInput(['readonly' => true]);

echo $form->field($model, 'prov');

//echo $form->field($model, 'town');
//
//echo $form->field($model, 'barangay');
//echo $form->field($model, 'sitio');


echo $form->field($model, 'acq_date')->textInput(['readonly' => true]);
//echo $form->field($model, 'latitude');
//
//echo $form->field($model, 'longitude');
//
//echo $form->field($model, 'altitude');
echo '</div><div class="col-md-4">';
echo $form->field($model, 'coll_source')->label('Collecting source')->textInput(['readonly' => true]);

echo $form->field($model, 'gen_stat')->label('Genetic status')->textInput(['readonly' => true]);

echo $form->field($model, 'sam_type')->label('Sample type')->textInput(['readonly' => true]);



echo $form->field($model, 'sam_met')->label('Sampling methods')->textInput(['readonly' => true]);

echo $form->field($model, 'mat')->label('Material collected')->textInput(['readonly' => true]);
echo $form->field($model, 'topo')->label('Topography')->textInput(['readonly' => true]);
echo '</div><div class="col-md-4">';
echo $form->field($model, 'site');

echo $form->field($model, 'soil_tex')->label('Soil texture')->textInput(['readonly' => true]);

echo $form->field($model, 'drain')->label('Drainage')->textInput(['readonly' => true]);

echo $form->field($model, 'soil_col')->label('Soil color')->textInput(['readonly' => true]);

echo $form->field($model, 'ston')->label('Stoniness')->textInput(['readonly' => true]);
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
<?php
ActiveForm::end();
?>

