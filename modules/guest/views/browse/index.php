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

use kartik\dynagrid\DynaGrid;
//use \yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

\yii\bootstrap\Modal::begin([
    'header' => '<i class="glyphicon glyphicon-search"></i> Advanced Search</h4>',
    'id' => 'stud-info',
    'closeButton' => ['id' => 'close-button'],
    'size' => 'modal-lg',
]);
?>

<div class="modal-body-large form-horizontal" id='modal-search-form-body' style="padding:10px 10px 20px 10px;">
    <p class="instruction" id="sel-records"></p>
    <?php
    echo $this->render('@app/modules/guest/views/browse/search/_search', ['model' => $searchModel]);
    ?>
</div>

<div class="modal-footer">
</div>
<?php
echo "<div id='search-content-id'></div>";
\yii\bootstrap\Modal::end();
?>
<legend>Browse Passport Data</legend>

<?php
//$form->field($model, 'StudName', [
//    'options' => ['enableAjaxValidation' => false]
//])->textInput();
//$searchModel = new \app\modules\guest\models\GermplasmSearch;

$viewMsg = 'view';
$updateMsg = 'update';
$deleteMsg = 'delete';
$dynagrid = DynaGrid::begin([
            'columns' => [
//                [
//                    'class' => 'kartik\grid\ActionColumn',
//                    'template' => '',
//                'buttons'=>[
//                        'today_action' => function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, 
//                        [
//                            'title' => Yii::t('app', 'Change today\'s lists'),
//                        ]);
//                    }
//                ],
//                    'dropdown' => false,
//                    'urlCreator' => function($action, $model, $key, $index) {
//                if ($action === 'view') {
//                    return \yii\helpers\Url::to(['/guest/view/index', 'id' => $model->id]);
//                }
//            },
//                    'viewOptions' => ['title' => 'View more information', 'data-toggle' => 'tooltip'],
////                'updateOptions' => ['title' => 'updateMsg', 'data-toggle' => 'tooltip'],
////                'deleteOptions' => ['title' => 'deleteMsg', 'data-toggle' => 'tooltip'],
//                    'order' => \kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT],
//            'id',
                'phl_no',
//            'creator_id',
//            'creation_timestamp',
//            'modifier_id',
                // 'modification_timestamp',
                // 'remarks:ntext',
                // 'Notes:ntext',
                // 'is_void:boolean',
                // 'crop_id',
                'old_acc_no',
                'gb_no',
                'collecting_no',
                'other_number',
                'variety_name',
                'dialect',
                'grower',
                [
                    'attribute' => 'scientific_name',
                    'format' => 'html',
                    'value' => function($model) {
                return '<i>' . $model->scientific_name . '</i>';
            }
                ],
                'count_coll',
                'prov',
//                'town',
//                'barangay',
//                'sitio',
                'acq_date',
                'remarks:ntext',
//                'latitude',
//                'longitude',
//                'altitude',
                'coll_source',
                'gen_stat',
                'sam_type',
                'sam_met',
                'mat',
                'topo',
                'site',
                'soil_tex',
                'drain',
                'soil_col',
                'ston',
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
                'pjax' => true,
//                    'panel' => [
//                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Library</h3>',
//                        'before' => '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
//                        'after' => false
//                    ],
                'toolbar' => [
                    ['content' =>
                        //Html::a('Create Germplasm Base', ['add'], ['class' => 'btn btn-success']).
                        Html::button('<i class="glyphicon glyphicon-search"></i>', [
                            //'value' => yii\helpers\Url::to('guest/browse/search'),
                            'data' => [
                                'toggle' => 'modal',
                                'target' => '#stud-info',
                            ],
                            'id' => 'search-btn-id',
                            'type' => 'button',
                            'title' => 'Advanced search',
                            'class' => 'btn btn-success',
                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
                        ]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
                    ],
                    ['content' => '{dynagridFilter}{dynagridSort}{dynagrid}'],
                    '{export}',
                ]
            ],
            'options' => ['id' => 'dynagrid-1'] // a unique identifier is important
        ]);
if (substr($dynagrid->theme, 0, 6) == 'simple') {
    $dynagrid->gridOptions['panel'] = false;
}
DynaGrid::end();
?>
