<div class="catalog-view-index">
    <h1></h1>
    <!--  <div id="div-id-success-notif" class="alert alert-success"></div>-->
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
                        'displayOnly' => true
                    ],
                    'variety_name',
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
                'enableEditMode' => true,
                'panel' => [
                    'heading' => 'Crop Collected',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'crop-collected-panel-id'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $contentB = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //  'id',
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
                'enableEditMode' => true,
                'panel' => [
                    'heading' => 'PGR Germplasm Accession Number',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'pgr-panel-id'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $contentC = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'acq_date',
                    'count_coll',
                    'prov',
                    'town',
                    //'donor source',
                    //'donor id no'
                    'grower',
                    //'contact no',
                    //'collectors',
                    [
                        'attribute' => 'coll_source',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['farmland' => 'farmland', 'backyard/ home garden' => 'backyard/ home garden', 'farm store/ threshing place' => 'farm store/ threshing place', 'village market' => 'village market', 'commercial seed shop' => 'commercial seed shop', 'agricultural institute' => 'agricultural institute', 'bordering field' => 'bordering field', 'natural vagetation/ wild' => 'natural vagetation/ wild', 'others' => 'others'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'gen_stat',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['wild' => 'wild', 'weedy' => 'weedy', 'primitive cultivar/ landrace' => 'primitive cultivar/ landrace', 'improved OP cultivar' => 'improved OP cultivar', 'hybrid cultivar' => 'hybrid cultivar', 'others' => 'others',],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'sam_type',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['single plant' => 'single plant', 'pure line/ clone' => 'pure line/ clone', 'mixture/ population (clone/ pure line)' => 'mixture/ population (clone/ pure line)', 'open pollinated' => 'open pollinated', 'others' => 'others',],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'sam_met',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['random' => 'random', 'non-random' => 'non-random',],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'mat',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['seed' => 'seed', 'fruit' => 'fruit', 'pod' => 'pod', 'others' => 'others'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'topo',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['swamp' => 'swamp', 'food plain' => 'food plain', 'level plain' => 'level plain', 'undulating' => 'undulating', 'hilly' => 'hilly', 'mountainous' => 'mountainous', 'others' => 'others'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'site',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['level' => 'level', 'slope' => 'slope', 'plateau' => 'plateau', 'depression' => 'depression', 'others' => 'others'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'soil_tex',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['sand' => 'sand', 'sandy loam' => 'sandy loam', 'loam' => 'loam', 'clay loam' => 'clay loam', 'silt' => 'silt', 'clay' => 'clay', 'highly organic (peat/muck)' => 'highly organic (peat/muck)', 'others' => 'others'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'soil_col',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['black' => 'black', 'dark brown' => 'dark brown', 'light brown' => 'light brown', 'grey' => 'grey', 'yellow' => 'yellow', 'red' => 'red', 'other' => 'other'],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'drain',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['poor' => 'poor', 'moderate' => 'moderate', 'good' => 'good', 'excessive' => 'excessive',],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'ston',
                        //'format' => 'raw',
                        //'value' => Html::a('John Steinbeck', '#', ['class' => 'kv-author-link']),
                        'type' => DetailView::INPUT_SELECT2,
                        'widgetOptions' => [
                            'data' => ['none' => 'none', 'low' => 'low', 'medium' => 'medium', 'rocky' => 'rocky',],
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
                        ],
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                //        '',
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
                'enableEditMode' => true,
                'panel' => [
                    'heading' => 'Other Details',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'other-details-panel-id'],
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
