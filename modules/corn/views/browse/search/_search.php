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
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-right: 0px; 
        padding-left: 10px;
    }
    .col-sm-6 {
        width: 68%;
        // background-color:#8BC34A;
    }
    /*.kv-child-table-row th {
        border-left: 0px #ddd solid; 
        border-right: 0px #ddd solid; 
        padding:3px;
        background:#8BC34A;
    }
    .kv-child-table td, .kv-child-table th {
        padding:3px;
        background:#8BC34A;
    }
    
    */    .form-control {
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
    .panel-title:hover {
        cursor: pointer;
    }



</style>
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\GermplasmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="germplasm-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['browse/index'],
                'method' => 'get',
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
//            [
//            'label2' => 'col-sm-2',
//            'offset2' => 'col-sm-offset-4',
//            'wrapper2' => 'col-sm-4',
//            'error2' => '',
//            'hint2' => '',
//                ]
                    ],
                ],
    ]);
    ?>

<div class="panel-body " >
    <?php
    echo '<div class="col-md-4">';

    //echo $form->field($model, 'phl_no');
    echo $form->field($model, 'variety_name');


    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'gb_no');

    echo $form->field($model, 'scientific_name');
    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'old_acc_no')->label('Old Accession No');
    echo '</div>';
    ?>
</div>
<hr></hr>
<?php
echo '<div class="col-md-4">';
//echo $form->field($model->crop, 'name')->label('Crop group');

echo $form->field($model, 'dialect');

echo $form->field($model, 'grower');

echo $form->field($model, 'count_coll');

//echo $form->field($model, 'prov');
//
//echo $form->field($model, 'town');
//
//echo $form->field($model, 'barangay');

//echo $form->field($model, 'sitio');

echo $form->field($model, 'acq_date');
echo '</div><div class="col-md-4">';
//echo $form->field($model, 'latitude');
//
//echo $form->field($model, 'longitude');
//
//echo $form->field($model, 'altitude');

echo $form->field($model, 'coll_source')->label('Collecting source');

echo $form->field($model, 'gen_stat')->label('Genetic status');

echo $form->field($model, 'sam_type')->label('Sample type');

echo $form->field($model, 'sam_met')->label('Sampling methods');

echo $form->field($model, 'mat')->label('Material collected');
echo '</div><div class="col-md-4">';
echo $form->field($model, 'topo')->label('Topography');

echo $form->field($model, 'site');

echo $form->field($model, 'soil_tex')->label('Soil texture');

echo $form->field($model, 'drain')->label('Drainage');

echo $form->field($model, 'soil_col')->label('Soil color');

echo $form->field($model, 'ston')->label('Stoniness');
echo '</div>';
?>
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
