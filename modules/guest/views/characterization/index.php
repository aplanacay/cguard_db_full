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
use kartik\grid\GridView;
use kartik\dynagrid\DynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\corn\models\CharacterizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Browse Characterization Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characterization-base-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php //Html::a('Create Characterization Base', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $dynagrid = DynaGrid::begin([
                'columns' => [
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '',
                        'dropdown' => false,
                        'urlCreator' => function($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return \yii\helpers\Url::to(['/guest/characterization/tabs', 'id' => $model->id]);
                    }
                },
                        'viewOptions' => ['title' => 'View more information', 'data-toggle' => 'tooltip'],
//                'updateOptions' => ['title' => 'updateMsg', 'data-toggle' => 'tooltip'],
//                'deleteOptions' => ['title' => 'deleteMsg', 'data-toggle' => 'tooltip'],
                        'order' => \kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT
                    ],
                    'days_to_emergence',
                    'days_to_tasseling',
                    'days_to_slking',
                    'days_to_harvest',
                    'tillering_index',
                    'stem_color',
                    'sheath_pubescence',
                    'total_number_of_leaves_per_plant',
                    'leaf_length',
                    'leaf_width',
                    'leaf_orientation',
                    'presence_of_leaf_ligule',
                    'venation_index',
                    'tassel_type',
                    'silk_color',
                    'tassel_color',
                    'plant_height',
                    'ear_height',
                    'foliage',
                    'number_of_leaves_above_upper_ear',
                    'number_of_leaves_below_upper_ear',
                    'number_of_internodes_below_uppermost_ear',
                    'number_of_internodes_on_the_whole_stem',
                    'stem_diameter_at_the_base',
                    'stem_diameter_below_uppermost_ear',
                    'tassel_length',
                    'tassel_peduncle_length',
                    'tassel_branching_space',
                    'number_of_primary_branches_on_tassel',
                    'number_of_secondary_branches_on_tassel',
                    'number_of_tertiary_branches_on_tassel',
                    'stay_green',
                    'days_to_ear_leaf_inflorescence',
                    'stalk_lodging',
                    'husk_cover',
                    'husk_fitting',
                    'husk_tip_shape',
                    'ear_shape',
                    'ear_tip_shape',
                    'ear_orientation',
                    'ear_length',
                    'ear_diameter',
                    'cob_diameter',
                    'rachs_diameter',
                    'peduncle_length',
                    'number_of_bracts',
                    'kernel_row_arrangement',
                    'number_of_kernel_rows',
                    'number_of_kernels__per_row',
                    'cob_color',
                    'grain_shedding',
                    'kernel_type',
                    'kernel_color',
                    'kernel_length',
                    'kernel_width',
                    'kernel_thickness',
                    'shape_of_upper_kernel_surface',
                    'pericarp_color',
                    'aleurone_color',
                    'endosperm_color',
                    'unshelled_weight',
                    'shelled_weight',
                    'kernel_weight',
                    'shellpc',
                ],
                'theme' => 'panel-default',
                'showPersonalize' => true,
                'storage' => 'cookie',
                'gridOptions' => [
                    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
                    'bordered' => false,
                    'condensed' => true,
                    //'export' => false,
                    'exportConfig' => [
                        // 'showConfirmAlert'=>true,
                        GridView::CSV => ['label' => 'Save as CSV'],
                        GridView::EXCEL => ['label' => 'Save as EXCEL'],
                    //  GridView::PDF => [// pdf settings],
                    ],
//                'defaultExportConfig' => [
//                    GridView::CSV => [
//                        'label' => 'CSV',
//                        'icon' => 'floppy-open',
//                        'iconOptions' => ['class' => 'text-primary'],
//                        'showHeader' => true,
//                        'showPageSummary' => true,
//                        'showFooter' => true,
//                        'showCaption' => true,
//                        'filename' => 'grid-export',
//                        'alertMsg' => 'The CSV export file will be generated for download.',
//                        'options' => ['title' => 'Comma Separated Values'],
//                        'mime' => 'application/csv',
//                        'config' => [
//                            'colDelimiter' => ",",
//                            'rowDelimiter' => "\r\n",
//                        ]
//                    ], GridView::EXCEL => [
//                        'label' => 'EXCEL',
//                        'icon' =>  'floppy-remove',
//                        'iconOptions' => ['class' => 'text-success'],
//                        'showHeader' => true,
//                        'showPageSummary' => true,
//                        'showFooter' => true,
//                        'showCaption' => true,
//                        'filename' => 'grid-export',
//                        'alertMsg' => 'The EXCEL export file will be generated for download.',
//                        'options' => ['title' => 'Microsoft Excel 95+'],
//                        'mime' => 'application/vnd.ms-excel',
//                        'config' => [
//                            'worksheet' => 'ExportWorksheet',
//                            'cssFile' => ''
//                        ]
//                    ],
//                //... // Make sure there is no GridView::PDF
//                ],
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'showPageSummary' => false,
                    'floatHeader' => true,
//            'pjax' => true,
//                    'panel' => [
//                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Library</h3>',
//                        'before' => '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
//                        'after' => false
//                    ],
                    'toolbar' => [
                        [//'content' =>
//                    //Html::a('Create Germplasm Base', ['add'], ['class' => 'btn btn-success']).
//                    Html::button('<i class="glyphicon glyphicon-search"></i>', [
//                        //'value' => yii\helpers\Url::to('guest/browse/search'),
//                        'data' => [
//                            'toggle' => 'modal',
//                            'target' => '#stud-info',
//                        ],
//                        'id' => 'search-btn-id',
//                        'type' => 'button',
//                        'title' => 'Advanced search',
//                        'class' => 'btn btn-success',
//                            //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                    ]) . ' ' .
//                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
                        ],
                        ['content' => '{dynagridFilter}{dynagridSort}{dynagrid}'],
                        '{export}',
                    ]
                ],
                'options' => ['id' => 'characterization-browser-id'] // a unique identifier is important
    ]);
    if (substr($dynagrid->theme, 0, 6) == 'simple') {
        $dynagrid->gridOptions['panel'] = false;
    }
    DynaGrid::end();
    ?>

</div>
