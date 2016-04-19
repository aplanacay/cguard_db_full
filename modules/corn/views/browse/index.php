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
    echo $this->render('@app/modules/corn/views/browse/search/_search', ['model' => $searchModel]);
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
//$searchModel = new \app\modules\corn\models\GermplasmSearch;

$viewMsg = 'view';
$updateMsg = 'update';
$deleteMsg = 'delete';
//$url=\yii\helpers\Url::to(['/corn/upload/image', 'id' => $model]);
$dynagrid = DynaGrid::begin([
            'columns' => [
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{delete}',
                    'buttons' => [
                        'upload' => function ($action, $model) {
//if ($action === 'upload') {
                    $url = \yii\helpers\Url::to(['/corn/upload/image', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-upload"></span>', $url, [
                                'title' => Yii::t('app', 'Upload image'),
                    ]);
                    //                  }
                }
                    ],
                    'dropdown' => false,
                    'urlCreator' => function($action, $model, $key, $index) {
                if ($action === 'view') {
                    return \yii\helpers\Url::to(['/corn/view/index', 'id' => $model->id]);
                }
            },
                    'viewOptions' => ['title' => 'View more information', 'data-toggle' => 'tooltip'],
//                'updateOptions' => ['title' => 'updateMsg', 'data-toggle' => 'tooltip'],
                    'deleteOptions' => ['title' => 'Delete record', 'data-toggle' => 'tooltip'],
                    'order' => \kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT],
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
                'town',
                'barangay',
                'sitio',
                'acq_date',
                'remarks:ntext',
                'latitude',
                'longitude',
                'altitude',
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
            'theme' => 'panel-success',
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
                            //'value' => yii\helpers\Url::to('corn/browse/search'),
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
