<div class="catalog-view-index">
    <h1></h1>
    <?php

    use yii\helpers\html;
    use kartik\tabs\TabsX;
    use yii\bootstrap\Modal;
    use yii\helpers\url;

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
    $contentD = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 'label' => 'Accession Number',
                        'value' => 'PHL 2020',
                    ],
                    [ 'label' => 'Lot / Batch Number',
                        'value' => '2012-081',
                    ],
                    [ 'label' => 'Store Location',
                        'value' => '031CE',
                    ],
                    [ 'label' => 'Number of packets (base)',
                        'value' => '10',
                    ],
                    [ 'label' => 'Number of packets (active)',
                        'value' => '5',
                    ],
                    [ 'label' => 'Estimated seed weight (active)',
                        'value' => '700g',
                    ],
                    [ 'label' => 'Estimated seed weight (base)',
                        'value' => '350g',
                    ],
                ],
                'valueColOptions'=>['style'=>'width:30%'],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => true,
                'panel' => [
                    'heading' => 'Inventory',
                    'type' => 'panel panel-success',
                ],
                'container' => ['id' => 'kv-demo'],
    ]);
    $contentE = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 'label' => 'Accession Number',
                        'value' => 'PHL 2020',
                    ],
                    [ 'label' => 'Lot / Batch Number',
                        'value' => '2012-081',
                    ],
                    [ 'label' => 'Seed Withdrawal Reference Number',
                        'value' => 'XXXXXX',
                    ],
                    [ 'label' => 'Date',
                        'value' => '2/10/2016',
                    ],
                    [ 'label' => 'Purpose',
                        'value' => 'Monitoring/Distrtibution',
                    ],
                    [ 'label' => 'Weight of seeds',
                        'value' => '',
                    ],
                    [ 'label' => 'Number of seeds',
                        'value' => '',
                    ],
                ],
                'valueColOptions'=>['style'=>'width:30%'],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => true,
                'panel' => [
                    'heading' => 'Seed Request',
                    'type' => 'panel panel-success',
                ],
                'container' => ['id' => 'kv-demo'],
    ]);
//for passport data
    $content1 = '<div class="catalog-view-index">
    <h1></h1>' . $contentA . $contentB . $contentC . '</div>';
//for seed avaiability
    $content2 = '<div class="catalog-view-index">
    <h1></h1><p>'. Html::a('Add to Inventory', ['/inventory/inventory'], ['class'=>'btn btn-primary']).'</p></div>';//' . $contentD . 
//for seed widthrawal
    $content3 = '<div class="catalog-view-index">
    <h1></h1>'. Html::a('Request Seed', ['/withdrawal/withdrawal'], ['class'=>'btn btn-primary']).'</p></div>';//' . $contentE . '</div>';
    $tab = '4';
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
            'label' => '<i class="glyphicon glyphicon-inbox"></i> Inventory',
            'content' => $content2,
            'active' => $tab === 3,
        ],
        [
            'label' => '<i class="glyphicon glyphicon-send"></i> Widthrawal',
            'content' => $content3,
            'active' => $tab === 4,
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
