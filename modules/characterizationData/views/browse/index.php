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

<div class="modal-body-small form-horizontal" id='modal-search-form-body' style="padding:10px 10px 20px 10px;">
    <p class="instruction" id="sel-records"></p>
    <?php

    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    ?>

    <div class="population-form">
        <?php $form = ActiveForm::begin(); ?>

        <?php
        //$model->name='IN';
        $model = \app\modules\catalog\models\Attributes::find()->asArray()->all();
        //
        $listData = ArrayHelper::map($model, 'id', 'abbrev');
        //print_r($listData);
        // echo $form->field($model, '')->dropDownList($model, ['prompt' => 'Choose...']);
        ?>

        <?php ActiveForm::end(); ?>
    </div>
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


$searchModel = new \app\modules\catalog\models\GermplasmSearch;
$viewMsg = 'view';
$updateMsg = 'update';
$deleteMsg = 'delete';
$dynagrid = DynaGrid::begin([
            'columns' => $columns,
            'theme' => 'panel-primary',
            'showPersonalize' => true,
            'storage' => 'cookie',
            'gridOptions' => [

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
//                        Html::button('<i class="glyphicon glyphicon-search"></i>', [
//                            'value' => yii\helpers\Url::to('catalog/browse/search'),
//                            'id' => 'search-btn-id',
//                            'type' => 'button',
//                            'title' => 'Advanced search',
//                            'class' => 'btn btn-success',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
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
