<?php

use kartik\tabs\TabsX;

$items = [

    [
        'label' => 'Variety Name and Number',
        'linkOptions' => ['data-url' => \yii\helpers\Url::to(['view/char-data', 'id' => $id])]
    ],
    [
        'label' => 'Seedling to Vegetative Stage',
        'headerOptions' => ['class' => 'disabled'],
        'options' => ['id' => 'seedling-tab-id'],
    ],
    [
        'label' => 'Milk Stage',
        'headerOptions' => ['class' => 'disabled'],
        'options' => ['id' => 'milk-tab-id'],
    ],
    [
        'label' => 'Ear Data',
        'headerOptions' => ['class' => 'disabled'],
        'options' => ['id' => 'ear-tab-id'],
        [
        'label' => 'Kernel Data',
        'headerOptions' => ['class' => 'disabled'],
        'options' => ['id' => 'kernel-tab-id'],
    ],
    ],
];
echo '<br><br>'.TabsX::widget([
    //'bordered'=>true,
    'items' => $items,
    'position' => TabsX::POS_LEFT,
    'encodeLabels' => false
]);
//use \kartik\detail\DetailView;
//
//$bordered = false;
//$striped = true;
//$condensed = true;
//$responsive = true;
//$hover = true;
//$hAlign = true;
//$vAlign = false;
//$fadeDelay = true;
//$content1 = \kartik\detail\DetailView::widget([
//            'model' => $model,
//            'attributes' => [
//                'crop_id',
//                // 'cultivar/variety_name/pedigree',
//                ['attribute' => 'scientific_name', 'type' => DetailView::INPUT_TEXT],
//            ],
//            'mode' => 'view',
//            'bordered' => $bordered,
//            'striped' => $striped,
//            'condensed' => $condensed,
//            'responsive' => $responsive,
//            'hover' => $hover,
//            'hAlign' => $hAlign,
//            'vAlign' => $vAlign,
//            'fadeDelay' => $fadeDelay,
//            'enableEditMode' => false,
//            'panel' => [
//                'heading' => 'Crop Collected',
//                'type' => 'panel panel-success',
//            ],
////        'deleteOptions' => [ // your ajax delete parameters
////            'params' => ['id' => 1000, 'kvdelete' => true],
////        ],
//            'container' => ['id' => 'kv-demo'],
////        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
//        ]);
//$content2 = \kartik\detail\DetailView::widget([
//            'model' => $model,
//            'attributes' => [
//                'id',
//                'phl_no',
//                'old_acc_no',
//                'gb_no',
//                'collecting_no'
//            ],
//            'mode' => 'view',
//            'bordered' => $bordered,
//            'striped' => $striped,
//            'condensed' => $condensed,
//            'responsive' => $responsive,
//            'hover' => $hover,
//            'hAlign' => $hAlign,
//            'vAlign' => $vAlign,
//            'fadeDelay' => $fadeDelay,
//            'enableEditMode' => false,
//            'panel' => [
//                'heading' => 'PGR Germplasm Accession Number',
//                'type' => 'panel panel-success',
//            ],
////        'deleteOptions' => [ // your ajax delete parameters
////            'params' => ['id' => 1000, 'kvdelete' => true],
////        ],
//            'container' => ['id' => 'kv-demo'],
////        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
//        ]);
//$content3 = \kartik\detail\DetailView::widget([
//            'model' => $model,
//            'attributes' => [
//                'acq_date',
//                //'collectors',
//                'coll_source',
//                //        '',
//                'count_coll',
//                'prov',
//                'town',
//                //'donor source',
//                //'donor id no'
//                //'source/grower',
//                //'contact no',
//                'coll_source',
//                'gen_stat',
//                'sam_type',
//                'sam_met',
//                'mat',
//                'topo'
//            ],
//            'mode' => 'view',
//            'bordered' => $bordered,
//            'striped' => $striped,
//            'condensed' => $condensed,
//            'responsive' => $responsive,
//            'hover' => $hover,
//            'hAlign' => $hAlign,
//            'vAlign' => $vAlign,
//            'fadeDelay' => $fadeDelay,
//            'enableEditMode' => false,
//            'panel' => [
//                'heading' => 'Other Details',
//                'type' => 'panel panel-success',
//            ],
////        'deleteOptions' => [ // your ajax delete parameters
////            'params' => ['id' => 1000, 'kvdelete' => true],
////        ],
//            'container' => ['id' => 'kv-demo'],
////        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
//        ]);
//$content = '<div class="catalog-view-index">
//    <h1></h1>' . $content1 . $content2 . $content3 . '</div>';







