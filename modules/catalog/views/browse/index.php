<br><br><br>
<br><br>
<?php

use kartik\dynagrid\DynaGrid;
//use \yii\helpers\ArrayHelper;
use yii\helpers\Html;

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
                'export' => false,
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
                        Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add Book', 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
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
