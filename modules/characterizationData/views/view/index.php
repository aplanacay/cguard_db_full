<div class="characterization-view-index">
    <legend>Corn Characterization Data</legend>
    <?php
    use kartik\tabs\TabsX;

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
                    //'id',
                    [ 'label' => 'PHL No.',
                        'value' => $model->phl_no,
                    ],
                    [ 'label' => 'Old Accession No.',
                        'value' => $model->old_acc_no,
                    ],
                    [ 'label' => 'Genebank No.',
                        'value' => $model->gb_no,
                    ],
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
                    //'heading' => 'Crop Collected',
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
                    //'id',


                    [ 'label' => 'Crop name/ Local Name',
                        'value' => $model->crop->name,
                    ],
                    [ 'label' => 'Species',
                        'value' => $model->scientific_name,
                    ],
                    [ 'label' => 'Country of Origin',
                        'value' => $model->count_coll,
                    ],
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
                    //'heading' => 'Crop Collected',
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
                    //'id',


                    [ 'label' => 'Date Planted',
                        'value' => '',
                    ],
                    [ 'label' => 'Location',
                        'value' => '',
                    ],
                    [ 'label' => 'Plot',
                        'value' => '',
                    ],
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
                    //'heading' => 'Crop Collected',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);

    $content_veg_stage = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    ['columns' => [
                            [ 'label' => 'PHL No.',
                                'value' => $model->phl_no,
                               
                            ],
                            [ 'label' => 'Accession No.',
                                'value' => $model->old_acc_no,
                                
                            ],
                            [ 'label' => 'GB No.',
                                'value' => $model->gb_no,
                                
                            ],
                            [ 'label' => 'Crop name',
                                'value' => $model->crop->name,
                                
                            ],
                            [ 'label' => 'Species',
                                'value' => $model->scientific_name,
                                
                            ],
                        
                        ],
                      'rowOptions' => ['class' => 'warning'],  
                    ]
                ],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => false,
                'condensed' => true,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => 'right',
                'vAlign' => 'left',
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => false,
//                'panel' => [
//                    //'heading' => 'Crop Collected',
//                    'type' => 'panel panel-success',
//                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    $items = [

        [
            'label' => 'Variety Name and Number',
            // 'linkOptions' => ['data-url' => \yii\helpers\Url::to(['view/char-data', 'id' => $id])]
            'content' => $contentA . '<br>' . $contentB . '<br>' . $contentC,
            'active' => true,
        //'active' => $tab === 1,
        ],
        [
            'label' => 'Seedling to Vegetative Stage',
            //'headerOptions' => ['class' => 'disabled'],
            'content' => $content_veg_stage,
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
    echo  TabsX::widget([
        'bordered'=>true,
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false
    ]);

//    $query = \app\modules\catalog\models\Germplasm::find();
//    $pagination = new yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 1]);
echo \yii\widgets\LinkPager::widget([
    'pagination'=>$dataProvider->pagination,
    'maxButtonCount'=>1,
    'nextPageLabel' => 'Next &raquo;',
    'prevPageLabel' => '&laquo; Previous',
    'firstPageLabel'=>true,
    'lastPageLabel'=>true
]);
//    echo \yii\widgets\LinkPager::widget([
//        'pagination' => $dataProvider->pagination,
//    ]);
    ?>
</div>