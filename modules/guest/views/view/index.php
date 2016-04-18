<style>


</style>
<div class="corn-view-index">
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
    $striped = false;
    $condensed = true;
    $responsive = true;
    $hover = false;
    $hAlign = true;
    $vAlign = false;
    $fadeDelay = false;
    $mode = 'edit';
    $enableEditMode = true;

// Above
    ?>
    <div class="row">
        <?php
        $tab = '3';
        $items = [
            [
                'label' => '<i class="glyphicon glyphicon-leaf"></i> Passport data',
                'content' => $this->render('passport_data', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'id' => $id
                ]),
                'active' => $tab === 1,
            ],
            [
                'label' => '<i class="glyphicon glyphicon-list-alt"></i> Characterization Data',
                'content' => $this->render('characteristics_data', [
                    'model' => $characterizationQuery,
                    //'dataProvider' => $dataProvider,
                    'id' => $id
                ]),
                'active' => $tab === 2,
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
                'headerOptions' => ['class' => 'disabled'],
                'active' => $tab === 2,
            ],
            [
                'label' => '<i class="glyphicon glyphicon-send"></i> Seed Request',
                'headerOptions' => ['class' => 'disabled'],
                'active' => $tab === 3,
            ],
            [
                'label' => '<i class="glyphicon glyphicon-map-marker"></i> Location',
                'content' => $this->render('germplasm_location', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'id' => $id
                ]),
                'active' => $tab === 5,
            ],
        ];
        ?>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 1,
            'nextPageLabel' => 'Next Record&raquo;',
            'prevPageLabel' => '&laquo; Previous Record',
            'firstPageLabel' => true,
            'lastPageLabel' => true,
            'options' => ['class' => 'pagination pull-right']
        ]);
        echo \kartik\helpers\Html::a('Show Tabular view', ['browse/index', 'GermplasmSearch' => Yii::$app->request->getQueryParam('GermplasmSearch')], ['class' => 'btn btn-success']);
        echo '<div class="pull-right" style="margin-top:7px;">';

        if ($dataProvider->pagination->totalCount === '0') {
            echo '<span style="font-size:14px;">  <b>0</b> </b> Results</b> &emsp; ';
            // $model= new \app\modules\corn\models\CharacterizationSearch();
        } else {
            echo '<span style="font-size:14px;"> Showing <b>' . ($dataProvider->pagination->page + 1) . '</b> of <b>' . $dataProvider->pagination->totalCount . '</b> Results</b> &emsp; ';
        }

        echo '</div>';

        echo '';
//    use kartik\export\ExportMenu;
//    echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => $gridColumns,
//    'fontAwesome' => true,
//]);
//        echo '<div class="pull-right">';
//         echo \kartik\helpers\Html::button('<i class="glyphicon glyphicon-search"></i>', [
//                            //'value' => yii\helpers\Url::to('guest/browse/search'),
//                            'data' => [
//                                'toggle' => 'modal',
//                                'target' => '#stud-info',
//                            ],
//                            'id' => 'search-btn-id',
//                            'type' => 'button',
//                            'title' => 'Advanced search',
//                            'class' => 'btn btn-success',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]).'&emsp;';
//         echo '</div>';

        ?>

        <?php
        echo '<br><br>';
        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'encodeLabels' => false,
            'bordered' => true,
            'containerOptions' => ['id' => 'view-passport-tabs-id']
        ]);
        ?>
        <?php
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
<?php yii\bootstrap\Modal::end(); ?>

        <?php
        \yii\bootstrap\Modal::begin([
            'header' => '<i class="glyphicon glyphicon-photo"></i> View Photo</h4>',
            'id' => 'germplasm-photo-modal-id',
            //'header' => '<h2></h2>',
            //'toggleButton' => ['label' => 'View Photo'],
            'closeButton' => ['id' => 'close-view-photo-button'],
            'size' => 'modal-lg',
        ]);
        ?>

        <div class="modal-body-large form-horizontal" id='germplasm-photo-modal-id-form-body' style="padding:10px 10px 20px 10px;">
            <p class="instruction" id="sel-records"></p>
<?php
echo $this->render('@app/modules/guest/views/view/_photo', ['id' => $id, 'model' => $model]);
?>
        </div>

        <div class="modal-footer">
        </div>
    </div>
<?php yii\bootstrap\Modal::end(); ?>
</div>
