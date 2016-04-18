<style>


</style>
<div class="corn-view-index">
    <h1></h1>
    <!--  <div id="div-id-success-notif" class="alert alert-success"></div>-->
    <?php
    $flashMessages = Yii::$app->session->allFlashes;
    if ($flashMessages) {

        foreach ($flashMessages as $key => $message) {
            ?>
            <div class="alert alert-<?php echo $key; ?>" role="alert">
                <?php
                echo Yii::$app->session->getFlash($key);
                ?>
            </div>
            <?php
        }
    }
    ?>
    <?php

    use kartik\tabs\TabsX;
    use \yii\bootstrap\Modal;
    use \kartik\detail\DetailView;

$content1 = '';
    $content2 = 'b';
    $content3 = 'c';
    $content4 = 'd';

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
        $tab = '';
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
                    'dataProvider' => $dataProviderCharacterization,
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
//            [
//                'label' => '<i class="glyphicon glyphicon-map-marker"></i> Location',
//                'content' => $this->render('passport_data', [
//                    'model' => $model,
//                    'dataProvider' => $dataProvider,
//                    'id' => $id
//                ]),
//                'active' => $tab === 4,
//            ],
            [
                'label' => '<i class="glyphicon glyphicon-map-marker"></i> Location',
                'content' => $this->render('germplasm_location', [
                    'model' => $characterizationQuery,
                    //'dataProvider' => $dataProvider,
                    'id' => $id
                ]),
                'active' => $tab === 5,
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

        echo '<br><br>';
//    use kartik\export\ExportMenu;
//    echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => $gridColumns,
//    'fontAwesome' => true,
//]);
//        echo '<div class="pull-right">';
//         echo '</div>';
//        echo '<div class="pull-right" style="margin-top:7px;">';
//        if ($dataProvider->pagination->totalCount === '0') {
//            echo '<span style="font-size:14px;">  <b>0</b> </b> Results</b> &emsp; ';
//            // $model= new \app\modules\corn\models\CharacterizationSearch();
//        } else {
//            echo '<span style="font-size:14px;"> Showing <b>' . ($dataProvider->pagination->page + 1) . '</b> of <b>' . $dataProvider->pagination->totalCount . '</b> Results</b> &emsp; ';
//        }
//        echo '</div>';
        ?>

        <?php
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
    </div>
    <?php Modal::end(); ?>
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
            ChromePhp::log($searchModel->id);
        echo $this->render('@app/modules/corn/views/view/_photo', ['id' => $searchModel->id, 'model' => $searchModel]);
        ?>
    </div>

    <div class="modal-footer">
    </div>
</div>
<?php Modal::end(); ?>



