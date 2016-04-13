
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
    .panel-title:hover {
        cursor: pointer;
    }
</style>
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use kartik\widgets\ActiveForm;
use kartik\select2\Select2;

//use kartik\widgets;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\CharacterizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characterization-base-search container-fluid">

    <?php
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'maxButtonCount' => 1,
        'nextPageLabel' => 'Next Record&raquo;',
        'prevPageLabel' => '&laquo; Previous Record',
        'firstPageLabel' => true,
        'lastPageLabel' => true,
        'options' => ['class' => 'pagination pull-right']
    ]);
    echo Html::a('Show Tabular View', ['characterization/index', 'CharacterizationSearch' => Yii::$app->request->getQueryParam('CharacterizationSearch')], ['class' => 'btn btn-success']);
//    use kartik\export\ExportMenu;
//    echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => $gridColumns,
//    'fontAwesome' => true,
//]);
    ?>
    <div class = "form-group pull-right" >

        <?php ?>

    </div>
    <br/><br/>

    <?php
    echo '<div class="pull-right" style="margin-top:7px;">';

    if ($dataProvider->pagination->totalCount === '0') {
        echo '<span style="font-size:14px;">  <b>0</b> </b> Results</b> &emsp; ';
        // $model= new \app\modules\corn\models\CharacterizationSearch();
    } else {
        echo '<span style="font-size:14px;"> Showing <b>' . ($dataProvider->pagination->page + 1) . '</b> of <b>' . $dataProvider->pagination->totalCount . '</b> Results</b> &emsp; ';
    }
    echo Html::button('<span class=\'glyphicon glyphicon-plus\'></span> Expand all', ['class' => 'btn btn-primary', 'id' => 'collapse-init']);
    echo '</div>';

    echo '<br><br><br>';

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

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingZero">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                    Variety Name and Number
                </a>
            </h4>
        </div>
        <div id="collapseZero" class="collapse in" role="tabpanel" aria-labelledby="headingZero">
            <div class="panel-body passport-data" >
                <?php
                echo '<div class="col-md-4">';
                if ($dataProvider->pagination->totalCount !== '0') {
                    echo $form->field($model->germplasm, 'phl_no')->textInput(['readonly' => true]);
                    echo $form->field($model->germplasm, 'variety_name')->textInput(['readonly' => true]);


                    echo '</div><div class="col-md-4">';
                    echo $form->field($model->germplasm, 'gb_no')->textInput(['readonly' => true]);

                    echo $form->field($model->germplasm, 'scientific_name')->textInput(['readonly' => true]);
                    echo '</div><div class="col-md-4">';
                    echo $form->field($model->germplasm, 'old_acc_no')->textInput(['readonly' => true]);
                    echo '</div>';
                }
                ActiveForm::end();
                echo '</div>';
                ?>  
            </div>
        </div>
    </div>
    <div class="panel panel-group" id="accordion">
        <!-- First Panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"
                    data-toggle="collapse" 
                    data-target="#collapseOne">
                    I. Plant Data
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">

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
//                    echo '<legend >I. Plant Data</legend>';
                    //  if ($dataProvider->pagination->totalCount !== '0') {
                    echo '<div class="col-md-4">';

                    echo $form->field($model, 'days_to_emergence')->textInput(['readonly' => true]);

                    echo $form->field($model, 'days_to_tasseling')->textInput(['readonly' => true]);

                    echo $form->field($model, 'days_to_slking')->textInput(['readonly' => true]);

                    echo $form->field($model, 'days_to_harvest')->textInput(['readonly' => true]);

                    echo $form->field($model, 'tillering_index')->textInput(['readonly' => true]);

                    echo $form->field($model, 'stem_color')->textInput(['readonly' => true]);

                    echo $form->field($model, 'sheath_pubescence')->textInput(['readonly' => true]);

                    echo $form->field($model, 'total_number_of_leaves_per_plant')->textInput(['readonly' => true]);

                    echo $form->field($model, 'leaf_length')->label('Leaf length(cm)')->textInput(['readonly' => true]);

                    echo $form->field($model, 'leaf_width')->label('Leaf width(cm)')->textInput(['readonly' => true]);

                    echo $form->field($model, 'leaf_orientation')->textInput(['readonly' => true]);

                    echo $form->field($model, 'presence_of_leaf_ligule')->textInput(['readonly' => true]);

                    echo $form->field($model, 'venation_index')->textInput(['readonly' => true]);
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo $form->field($model, 'tassel_type')->textInput(['readonly' => true]);

                    echo $form->field($model, 'silk_color')->textInput(['readonly' => true]);

                    echo $form->field($model, 'tassel_color')->textInput(['readonly' => true]);

                    echo $form->field($model, 'plant_height')->label('Plant height (cm)')->textInput(['readonly' => true]);


                    echo $form->field($model, 'ear_height')->label('Ear height (cm)')->textInput(['readonly' => true]);

//echo $form->field($model, 'foliage')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_leaves_above_upper_ear')->label('Number of leaves above uppermost ear including ear leaf')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_leaves_below_upper_ear')->label('Number of leaves below uppermost ear including ear leaf')->textInput(['readonly' => true]);
//    echo '</div>';
//    echo '<div class="col-md-3">';
                    echo $form->field($model, 'number_of_internodes_below_uppermost_ear')->label('Number of internodes below uppermost ear')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_internodes_on_the_whole_stem')->label('Number of internodes on the whole stem')->textInput(['readonly' => true]);

                    echo $form->field($model, 'stem_diameter_at_the_base')->label('Stem diameter at the base (cm)')->textInput(['readonly' => true]);
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo $form->field($model, 'stem_diameter_below_uppermost_ear')->textInput(['readonly' => true]);

                    echo $form->field($model, 'tassel_length')->label('Tassel length (cm)')->textInput(['readonly' => true]);


                    echo $form->field($model, 'tassel_peduncle_length')->label('Tassel peduncle length (cm)')->textInput(['readonly' => true]);
//    echo '</div>';
//    echo '<div class="col-md-3">';
                    echo $form->field($model, 'tassel_branching_space')->label('Tassel branching space (cm)')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_primary_branches_on_tassel')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_secondary_branches_on_tassel')->textInput(['readonly' => true]);

                    echo $form->field($model, 'number_of_tertiary_branches_on_tassel')->textInput(['readonly' => true]);

                    echo $form->field($model, 'stay_green')->textInput(['readonly' => true]);

                    echo $form->field($model, 'days_to_ear_leaf_inflorescence')->textInput(['readonly' => true]);

                    echo $form->field($model, 'stalk_lodging')->textInput(['readonly' => true]);
                    echo '</div>';
                    // }
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-group" id="accordion">
            <!-- First Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"
                        data-toggle="collapse" 
                        data-target="#collapseTwo">
                        II. Ear Data
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
//  echo '<legend>II. Ear Data</legend>';
//                    if ($dataProvider->pagination->totalCount !== '0') {
                        echo '<div class="col-md-4">';
                        echo $form->field($model, 'husk_cover')->textInput(['readonly' => true]);

                        echo $form->field($model, 'husk_fitting')->textInput(['readonly' => true]);

                        echo $form->field($model, 'husk_tip_shape')->textInput(['readonly' => true]);

                        echo $form->field($model, 'ear_shape')->textInput(['readonly' => true]);

                        echo $form->field($model, 'ear_tip_shape')->textInput(['readonly' => true]);

                        echo $form->field($model, 'ear_orientation')->textInput(['readonly' => true]);

                        echo $form->field($model, 'ear_length')->textInput(['readonly' => true]);

                        echo $form->field($model, 'ear_diameter')->textInput(['readonly' => true]);
                        echo '</div><div class="col-md-6">';
                        echo $form->field($model, 'cob_diameter')->textInput(['readonly' => true]);

                        echo $form->field($model, 'rachs_diameter')->textInput(['readonly' => true]);

                        echo $form->field($model, 'peduncle_length')->textInput(['readonly' => true]);

                        echo $form->field($model, 'number_of_bracts')->textInput(['readonly' => true]);

                        echo $form->field($model, 'kernel_row_arrangement')->textInput(['readonly' => true]);

                        echo $form->field($model, 'number_of_kernel_rows')->textInput(['readonly' => true]);

                        echo $form->field($model, 'number_of_kernels__per_row')->textInput(['readonly' => true]);

                        echo $form->field($model, 'cob_color')->textInput(['readonly' => true]);
                        echo '</div>';
//                    }
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-group" id="accordion">
                <!-- First Panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"
                            data-toggle="collapse" 
                            data-target="#collapseThree">
                            III. Kernel Data
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
// echo '<legend>III. Kernel Data</legend>';
//                    if ($dataProvider->pagination->totalCount !== '0') {
                            echo '<div class="col-md-6">';
                            echo $form->field($model, 'grain_shedding')->label('% Grain shielding')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_type[]')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_color[]')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_length')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_width')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_thickness')->textInput(['readonly' => true]);

                            echo $form->field($model, 'shape_of_upper_kernel_surface')->textInput(['readonly' => true]);
                            echo '</div>';

                            echo '<div class="col-md-6">';
                            echo $form->field($model, 'pericarp_color')->textInput(['readonly' => true]);

                            echo $form->field($model, 'aleurone_color')->textInput(['readonly' => true]);

                            echo $form->field($model, 'endosperm_color')->textInput(['readonly' => true]);
                            echo $form->field($model, 'unshelled_weight')->textInput(['readonly' => true]);

                            echo $form->field($model, 'shelled_weight')->textInput(['readonly' => true]);

                            echo $form->field($model, 'kernel_weight')->textInput(['readonly' => true]);

                            echo $form->field($model, 'shellpc')->textInput(['readonly' => true]);
                            echo '</div>';
//                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            echo '</div>';
            echo '<legend></legend>';
// echo $form->field($model, 'creator_id')->textInput(['readonly' => true]);
//     echo $form->field($model, 'creation_timestamp')->textInput(['readonly' => true]);
//
//     echo $form->field($model, 'modifier_id')->textInput(['readonly' => true]);
//
//     echo $form->field($model, 'modification_timestamp')->textInput(['readonly' => true]);
//
//     echo $form->field($model, 'remarks')->textInput(['readonly' => true]);
//
//     echo $form->field($model, 'Notes')->textInput(['readonly' => true]);
//
//     echo $form->field($model, 'is_void')->checkbox();
            ?>


        </div>

        <?php
//$this->registerJs($this->renderPartial('@app/js/characterization_search.js'));
//$this->registerJsFile('@web/js/characterization_search.js');
//$this->registerJsFile(
//        '@web/js/characterization_search.js', 
//   [ 'depends' => ['\yii\web\JqueryAsset'], 'position' => '\yii\web\View::POS_END', ],
//);

        $this->registerJsFile('@web/js/characterization_search.js', [ 'depends' => ['app\assets\AppAsset'], 'position' => \yii\web\View::POS_END,]);
        ?>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 1,
            'nextPageLabel' => 'Next Record&raquo;',
            'prevPageLabel' => '&laquo; Previous Record',
            'firstPageLabel' => true,
            'lastPageLabel' => true,
            'options' => ['class' => 'pagination pull-right'],
        ]);
        ActiveForm::end();
        ?>

    </div>