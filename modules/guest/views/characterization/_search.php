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
//use kartik\widgets\ActiveForm;
use kartik\select2\Select2;

//use kartik\widgets;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\CharacterizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characterization-base-search container-fluid">

    <?php
    $form = ActiveForm::begin([
                // 'options'=>['style'=>'    position: relative;\/* min-height: 1px; */padding-right: 15px;/* padding-left: 15px; */'],
                //  'type' => ActiveForm::TYPE_HORIZONTAL,
                // 'formConfig' => ['labelSpan' => 2.5, 'deviceSize' => ActiveForm::SIZE_SMALL],
                'method' => 'get',
                'action' => ['characterization/tabs'],
                //  'options' => ['method' => 'post'],
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

//   echo Form::widget([
//    'model'=>$model,
//    'form'=>$form,
//    'columns'=>2,
//    'attributes'=>$model->formAttribs
//]);
//    echo '<div class="panel panel-default">';
//    echo '<div class="panel-heading">I. PLANT DATA</div>';
//    echo '<div class="panel-body">';
    ?>
    <div class = "form-group pull-right" >
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-success']); ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
        <?php echo Html::button('<span class=\'glyphicon glyphicon-plus\'></span> Expand all', ['class' => 'btn btn-primary', 'id' => 'collapse-init']); ?>
        <br/><br/>
    </div>
    <br><br><br>
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
                    // echo '<legend >I. Plant Data</legend>';
                    echo '<div class="col-md-3">';

                    echo $form->field($model, 'days_to_emergence');

                    echo $form->field($model, 'days_to_tasseling');

                    echo $form->field($model, 'days_to_slking');

                    echo $form->field($model, 'days_to_harvest');

                    echo $form->field($model, 'tillering_index');

                    echo $form->field($model, 'stem_color[]')->checkboxList(['Green' => 'Green', 'Sun red' => 'Sun red', 'Red' => 'Red', 'Purple' => 'Purple', 'Brown' => 'Brown']);

                    echo $form->field($model, 'sheath_pubescence[]')->checkboxList(['Sparse' => 'Sparse', 'Intermediate' => 'Intermediate', 'Dense' => 'Dense']);

                    echo $form->field($model, 'total_number_of_leaves_per_plant');

                    echo $form->field($model, 'leaf_length')->label('Leaf length(cm)');

                    echo $form->field($model, 'leaf_width')->label('Leaf width(cm)');
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo $form->field($model, 'leaf_orientation')->widget(Select2::classname(), [
                        'data' => ['Erect' => '1 Erect', 'Pendant' => '2 Pendant'],
                        'options' => ['placeholder' => 'Select leaf orientation...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]]
                    );

                    echo $form->field($model, 'presence_of_leaf_ligule')->widget(Select2::classname(), [
                        'data' => ['Present' => '+ Present', 'Absent' => '0 Absent'],
                        'options' => ['placeholder' => 'Select presence of leaf ligule...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]]
                    );


                    echo $form->field($model, 'venation_index');

                    echo $form->field($model, 'tassel_type');

                    echo $form->field($model, 'silk_color')->widget(Select2::classname(), [
                        'data' => ['Purple' => '1 Purple', 'Salmon' => '2 Salmon', 'Light yellow' => '3 Light yellow', 'Green' => '4 Green'],
                        'options' => ['placeholder' => 'Select silk color...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]]
                    );


                    echo $form->field($model, 'tassel_color')->widget(Select2::classname(), [
                        'data' => ['Purple' => '1 Purple', '2 Green' => 'Green', '3 Yellowish' => 'Yellowish'],
                        'options' => ['placeholder' => 'Select tassel color...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]]
                    );

                    echo $form->field($model, 'plant_height')->label('Plant height (cm)');


                    echo $form->field($model, 'ear_height')->label('Ear height (cm)');

                    //echo $form->field($model, 'foliage');
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo $form->field($model, 'number_of_leaves_above_upper_ear')->label('Number of leaves above uppermost ear including ear leaf');

                    echo $form->field($model, 'number_of_leaves_below_upper_ear')->label('Number of leaves blow uppermost ear including ear leaf');

                    echo $form->field($model, 'number_of_internodes_below_uppermost_ear')->label('Number of internodes below uppermost ear');

                    echo $form->field($model, 'number_of_internodes_on_the_whole_stem')->label('Number of internodes on the whole stem');

                    echo $form->field($model, 'stem_diameter_at_the_base')->label('Stem diameter at the base (cm)');

                    echo $form->field($model, 'stem_diameter_below_uppermost_ear');

                    echo $form->field($model, 'tassel_length')->label('Tassel length (cm)');
                    echo '</div>';
                    echo '<div class="col-md-3">';

                    echo $form->field($model, 'tassel_peduncle_length')->label('Tassel peduncle length (cm)');

                    echo $form->field($model, 'tassel_branching_space')->label('Tassel branching space (cm)');

                    echo $form->field($model, 'number_of_primary_branches_on_tassel');

                    echo $form->field($model, 'number_of_secondary_branches_on_tassel');

                    echo $form->field($model, 'number_of_tertiary_branches_on_tassel');

                    echo $form->field($model, 'stay_green')->widget(Select2::classname(), [
                        'data' => ['Low' => '3 Low', 'Medium' => '5 Medium', 'High' => '7 High'],
                        'options' => ['placeholder' => 'Select stay green...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]]
                    );

                    echo $form->field($model, 'days_to_ear_leaf_inflorescence');

                    echo $form->field($model, 'stalk_lodging');

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
                        data-target="#collapseTwo">
                        II. Ear Data
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
//    echo '<legend>II. Ear Data</legend>';
                        echo '<div class="col-md-6">';
                        echo $form->field($model, 'husk_cover')->widget(Select2::classname(), [
                            'data' => ['Poor' => '3 Poor', 'Intermediate' => ' 5 Intermediate', 'Good' => '7 Good'],
                            'options' => ['placeholder' => 'Select husk cover...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'husk_fitting')->widget(Select2::classname(), [
                            'data' => ['Loose' => '3 Loose', '5 Medium' => 'Medium', 'High' => ' 7High'],
                            'options' => ['placeholder' => 'Select husk fitting...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );
                        ;

                        echo $form->field($model, 'husk_tip_shape')->widget(Select2::classname(), [
                            'data' => ['Blunt' => '1 Blunt', 'Short' => '5 Short', 'Long' => '7 Long'],
                            'options' => ['placeholder' => 'Select husk tip shape...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'ear_shape')->widget(Select2::classname(), [
                            'data' => ['Cylindrical' => '1 Cylindrical', 'Tapered/ Cylindrical-conical' => '2 Tapered/ Cylindrical-conical', 'Conical' => '3 Conical', 'Others' => '4 Others', 'Round' => '5 Round'],
                            'options' => ['placeholder' => 'Select ear shape...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'ear_tip_shape')->widget(Select2::classname(), [
                            'data' => ['Blunt' => '1 Blunt', 'Short,pointed' => '5 Short,pointed', 'Long,pointed' => '9 Long,pointed'],
                            'options' => ['placeholder' => 'Select ear tip shape...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'ear_orientation')->widget(Select2::classname(), [
                            'data' => ['Erect' => '1 Erect', 'Semi-erect' => '3 Semi-erect', 'Horizontal' => '5 Horizontal', 'Hanging' => '7 Hanging', 'Pointing downward' => '9 Pointing downward'],
                            'options' => ['placeholder' => 'Select ear orientation...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'ear_length');

                        echo $form->field($model, 'ear_diameter');
                        echo '</div><div class="col-md-6">';
                        echo $form->field($model, 'cob_diameter');

                        echo $form->field($model, 'rachs_diameter');

                        echo $form->field($model, 'peduncle_length');

                        echo $form->field($model, 'number_of_bracts');

                        echo $form->field($model, 'kernel_row_arrangement')->widget(Select2::classname(), [
                            'data' => ['Regular' => '1 Regular', 'Irregular' => '2 Irregular', 'Straight' => '3 Straight', 'Spiral' => '4 Spiral',],
                            'options' => ['placeholder' => 'Select kernel row arragement...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'number_of_kernel_rows');

                        echo $form->field($model, 'number_of_kernels__per_row');

                        echo $form->field($model, 'cob_color')->widget(Select2::classname(), [
                            'data' => ['White' => '1 White', 'Red' => '2 Red', 'Brown' => '3 Brown', 'Purple' => '4 Purple', 'Variegated' => '5 Variegated', 'Other' => '6 Other'],
                            'options' => ['placeholder' => 'Select cob color...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );
                        ?>
                    </div>
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
                        echo '<div class="col-md-6">';
                        echo $form->field($model, 'grain_shedding')->label('% Grain shielding');

                        echo $form->field($model, 'kernel_type[]')->checkboxList(['Floury' => '1 Floury', 'Semi floury' => '2 Semi floury (morocho), with an external layer of hard endosperm', 'Dent' => '3 Dent', 'Semi-dent' => '4 Semi-dent, intermediate between dent and fint but closer to dent', 'Semi-flint' => '5 Semi-flint, flint with soft cap', 'Flint' => '6 Flint', 'Pop' => '7 Pop', 'Sweet' => '8 Sweet', 'Opaque' => '9 Opaque 2/QPM', 'Tunicate' => '10 Tunicate', 'Waxy' => '11 Waxy']);

                        echo $form->field($model, 'kernel_color[]')->checkboxList(['White' => '1 White', 'Yellow' => '2 Yellow', 'Purple' => '3 Purple', 'Variegated' => '4 Variegated', 'Brown' => '5 Brown', 'Orange' => '6 Orange', 'Mottled' => '7 Mottled', 'White cap' => '8 White cap', 'Red' => '9 Red',]);
                        echo '</div>';

                        echo '<div class="col-md-6">';
                        echo $form->field($model, 'kernel_length');

                        echo $form->field($model, 'kernel_width');

                        echo $form->field($model, 'kernel_thickness');

                        echo $form->field($model, 'shape_of_upper_kernel_surface')->widget(Select2::classname(), [
                            'data' => ['Shrunken' => '1 Shrunken', 'Indented' => '2 Indented', 'Level' => '3 Level', 'Rounded' => '4 Rounded', 'Pointed' => '5 Pointed', 'Strongly pointed' => '6 Stronly pointed'],
                            'options' => ['placeholder' => 'Select shape of upper kernel surface...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'pericarp_color')->widget(Select2::classname(), [
                            'data' => ['Colorless' => '1 Colorlesss', 'Greyish type' => '2 Greyish type', 'Red' => '3 Red', 'Brown' => '4 Brown', 'Other' => '5 Other',],
                            'options' => ['placeholder' => 'Select pericarp color...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'aleurone_color')->widget(Select2::classname(), [
                            'data' => ['Colorless' => '1 Colorlesss', 'Bronze' => '2 Bronze', 'Red' => '3 Red', 'Purple' => '4 Purple', 'Other' => '5 Other',],
                            'options' => ['placeholder' => 'Select pericarp color...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'endosperm_color')->widget(Select2::classname(), [
                            'data' => ['White' => '1 White', 'Cream' => '2 Cream', 'Pale yellow' => '3 Pale yellow', 'Yellow' => '4 Yellow', 'Orange' => '5 Orange', 'White cap' => '6 White cap'],
                            'options' => ['placeholder' => 'Select endosperm color...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]]
                        );

                        echo $form->field($model, 'unshelled_weight');

                        echo $form->field($model, 'shelled_weight');

                        echo $form->field($model, 'kernel_weight');

                        echo $form->field($model, 'shellpc');
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // echo '<legend></legend>';
        // echo $form->field($model, 'creator_id');
//     echo $form->field($model, 'creation_timestamp');
//
//     echo $form->field($model, 'modifier_id');
//
//     echo $form->field($model, 'modification_timestamp');
//
//     echo $form->field($model, 'remarks');
//
//     echo $form->field($model, 'Notes');
//
//     echo $form->field($model, 'is_void')->checkbox();
        ?>

        <div class = "form-group pull-right">
            <?php //echo Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
            <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
            
        </div>

        <?php
        ActiveForm::end();
        ?>

    </div>
</div>

<?php
//$this->registerJs($this->renderPartial('@app/js/characterization_search.js'));
//$this->registerJsFile('@web/js/characterization_search.js');
//$this->registerJsFile(
//        '@web/js/characterization_search.js', 
//   [ 'depends' => ['\yii\web\JqueryAsset'], 'position' => '\yii\web\View::POS_END', ],
//);

$this->registerJsFile('@web/js/characterization_search.js', [ 'depends' => ['app\assets\AppAsset'], 'position' => \yii\web\View::POS_END, ]);
?>