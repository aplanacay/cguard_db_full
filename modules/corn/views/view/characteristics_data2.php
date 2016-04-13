<div class="characterization-view-index">
    <!--<legend>Corn Characterization Data</legend>-->
    <?php

    use kartik\tabs\TabsX;

\yii\bootstrap\Modal::begin([
        'header' => '<i class="glyphicon glyphicon-search"></i> Advanced Search</h4>',
        'id' => 'stud-info',
        'closeButton' => ['id' => 'close-button'],
        'size' => 'modal-md',
    ]);
    ?>

    <div class="modal-body-small form-horizontal" id='modal-search-form-body' style="padding:10px 10px 20px 10px;">
        <p class="instruction" id="sel-records"></p>
        <?php
        //  echo $this->render('@app/modules/corn/views/browse/search/_search', ['model' => $searchModel]);
        ?>
    </div>

    <div class="modal-footer">
    </div>
    <?php
    echo "<div id='search-content-id'></div>";
    \yii\bootstrap\Modal::end();

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
                'panel' => [
                    //'heading' => 'Crop Collected',
                    'type' => 'panel panel-success',
                ],
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

    $content_veg_stage_table2 = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    ['columns' => [
                            [ 'label' => 'Days to emergence',
                                'value' => '',
                            ],
                            [ 'label' => 'Total number of leaves per plant',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Tassel color',
                                'value' => '',
                            ],
                            [ 'label' => 'Leaf length (cm)',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Density of spikelets of tassel',
                                'value' => '',
                            ],
                            [ 'label' => 'Leaf width (cm)',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Anthocyanin coloration of silks',
                                'value' => '',
                            ],
                            [ 'label' => 'Leaf orientation',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
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

    $columns_milk_stage = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    ['columns' => [
                            [ 'label' => 'Plant height (cm)',
                                'value' => '',
                            ],
                            [ 'label' => 'Ear height (cm)',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Length of main axis above lowest lateral branch',
                                'value' => '',
                            ],
                            [ 'label' => 'Number of leaves aboeve the uppermost ear including ear leaf',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Length of main axis above highest lateral branch',
                                'value' => '',
                            ],
                            [ 'label' => 'Number of leaves below uppermost ear including ear leaf',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Length of lateral branch',
                                'value' => '',
                            ],
                            [ 'label' => 'Anthocyanin coloration of leaf shealth',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
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


    $columns_ear_data = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    ['columns' => [
                            [ 'label' => 'Husk cover',
                                'value' => '',
                            ],
                            [ 'label' => 'Ear damage',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Husk fitting',
                                'value' => '',
                            ],
                            [ 'label' => 'Unshelled weight',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Husk tip shape',
                                'value' => '',
                            ],
                            [ 'label' => 'Ear length (cm)',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Ear shape',
                                'value' => '',
                            ],
                            [ 'label' => 'Penducle length (cm)',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
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
    $columns_kernel_data = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    ['columns' => [
                            [ 'label' => 'Kernel type',
                                'value' => '',
                            ],
                            [ 'label' => 'Shape of upper kernel surface',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Kernel color',
                                'value' => '',
                            ],
                            [ 'label' => 'Pericarp color',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Kernel length (mm)',
                                'value' => '',
                            ],
                            [ 'label' => 'Alerurone color',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
                    ['columns' => [
                            [ 'label' => 'Kernel thickness (mm)',
                                'value' => '',
                            ],
                            [ 'label' => 'Endosperm color',
                                'value' => $model->old_acc_no,
                            ],
                        ],
                    ],
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
            'content' => $content_veg_stage . '<br>' . $content_veg_stage_table2,
            'options' => ['id' => 'seedling-tab-id'],
        ],
        [
            'label' => 'Milk Stage', $columns_milk_stage,
            //'headerOptions' => ['class' => 'disabled'],
            'content' => $content_veg_stage . '<br>' . $columns_milk_stage,
            'options' => ['id' => 'milk-tab-id'],
        ],
        [
            'label' => 'Ear Data',
            // 'headerOptions' => ['class' => 'disabled'],
            'content' => $content_veg_stage . '<br>' . $columns_ear_data,
            'options' => ['id' => 'ear-tab-id'],
        ],
        [
            'label' => 'Kernel Data',
            //'headerOptions' => ['class' => 'disabled'],
            'content' => $content_veg_stage . '<br>' . $columns_kernel_data,
            'options' => ['id' => 'kernel-tab-id'],
        ],
    ];
    echo TabsX::widget([
        'bordered' => true,
        'items' => $items,
        'position' => TabsX::POS_LEFT,
        'encodeLabels' => false
    ]);

    //    $query = \app\modules\corn\models\Germplasm::find();
    //    $pagination = new yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 1]);
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'maxButtonCount' => 1,
        'nextPageLabel' => 'Next &raquo;',
        'prevPageLabel' => '&laquo; Previous',
        'firstPageLabel' => true,
        'lastPageLabel' => true
    ]);
    //    echo \yii\widgets\LinkPager::widget([
    //        'pagination' => $dataProvider->pagination,
    //    ]);
    ?>
</div>
