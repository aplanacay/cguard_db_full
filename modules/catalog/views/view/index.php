<div class="catalog-view-index">
    <h1></h1>
    <?php

    use kartik\tabs\TabsX;

$content1 = '';
    $content2 = 'b';
    $content3 = 'c';
    $content4 = 'd';

    use \kartik\detail\DetailView;

$bordered = false;
    $striped = true;
    $condensed = true;
    $responsive = true;
    $hover = true;
    $hAlign = true;
    $vAlign = false;
    $fadeDelay = true;
    $contentA = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 'label' => 'Crop name',
                        'value' => $model->crop->name,
                    ],
                    [ 'label' => 'Local name',
                        //'value' => $model->variety_name,
                        'value' => $model->variety_name != null ? $model->variety_name : '',
                    ],
                    // 'cultivar/variety_name/pedigree',
                    'scientific_name',
                ],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => false,
                'panel' => [
                    'heading' => 'Crop Collected',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $contentB = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'phl_no',
                    'old_acc_no',
                    'gb_no',
                    'collecting_no'
                ],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => false,
                'panel' => [
                    'heading' => 'PGR Germplasm Accession Number',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $contentC = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'acq_date',
                    //'collectors',
                    'coll_source',
                    //        '',
                    'count_coll',
                    'prov',
                    'town',
                    //'donor source',
                    //'donor id no'
                    //'source/grower',
                    //'contact no',
                    'coll_source',
                    'gen_stat',
                    'sam_type',
                    'sam_met',
                    'mat',
                    'topo'
                ],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => false,
                'panel' => [
                    'heading' => 'Other Details',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $content1 = '<div class="catalog-view-index">
    <h1></h1>' . $contentA . $contentB . $contentC . '</div>';
    $tab = '3';
    $items = [
        [
            'label' => '<i class="glyphicon glyphicon-leaf"></i> Passport data',
            'content' => $content1,
            'active' => $tab === 1,
        ],
        [
            'label' => '<i class="glyphicon glyphicon-list-alt"></i> Characterization Data',
            'linkOptions' => ['data-url' => \yii\helpers\Url::to(['view/char-data', 'id' => $id])]
//            'items' => [
//                [
//                    'label' => '<i class="glyphicon glyphicon-chevron-right"></i> Option 1',
//                    'encode' => false,
//                    'content' => $content3,
//                ],
//                [
//                    'label' => '<i class="glyphicon glyphicon-chevron-right"></i> Option 2',
//                    'encode' => false,
//                    'content' => $content4,
//                ],
//            ],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-inbox"></i> Seed Availability',
            // 'headerOptions' => ['class' => 'disabled'],
            'active' => $tab === 2,
        ],
        [
            'label' => '<i class="glyphicon glyphicon-send"></i> Seed Request',
            'headerOptions' => ['class' => 'disabled'],
            'active' => $tab === 3,
        ],
    ];
// Above
    echo TabsX::widget([
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'containerOptions' => ['id' => 'view-passport-tabs-id']
    ]);
    ?>
</div>
