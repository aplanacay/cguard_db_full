<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\SideNav;
use yii\helpers\Url;
?>

<?php
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
//app\assets\MaterialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrapper">
            <?php
            NavBar::begin([
                'brandLabel' => 'CornBase',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    //'style'=>'height:80;width:100',
                    'class' => 'navbar-inverse navbar-fixed-top navbar-lg',
                //'class' => 'navbar-black navbar-fixed-top nav-condensed',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'ABOUT US', 'url' => ['/site/about']],
                        // ['label' => 'OUR PEOPLE', 'url' => ['/site/people']],
                        ['label' => 'OUR WORK', 'url' => ['/site/work']],
                        ['label' => 'Login', 'url' => ['/site/login']],
                    ],
                ]);
            } else {
                $user_id = Yii::$app->user->getId();
                $user = \app\models\Users::findOne($user_id);
                if ($user->type === 'admin') {
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'encodeLabels' => false,
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'ABOUT US', 'url' => ['/site/about']],
                            // ['label' => 'OUR PEOPLE', 'url' => ['/site/people']],
                            ['label' => 'OUR WORK', 'url' => ['/site/work']],
                            ['label' => 'Crop Group',
                                'items' => [
                                    //label' => 'Cereal',
                                    //    'items' => [
                                    ['label' => 'Corn', 'url' => ['/corn/browse']
                                    //],
                                    //['label' => '<span class="mdi-action-language"></span>Resources', 'url' => ['/docs']],
                                    //  ]
                                    ]
                                ], //
                            ],
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post']],
                        ],
                    ]);
                }
//                else {
//                    echo Nav::widget([
//                        'options' => ['class' => 'navbar-nav navbar-right'],
//                        'encodeLabels' => false,
//                        'items' => [
//                            ['label' => 'Home', 'url' => ['/site/index']],
//                            ['label' => 'Resources',
//                                'items' => [
//                                    ['label' => 'Corn', 'url' => ['/characterizationData/browse']],
//                                //['label' => '<span class="mdi-action-language"></span>Resources', 'url' => ['/docs']],
//                                ],
//                            ],
//                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//                                'url' => ['/site/logout'],
//                                'linkOptions' => ['data-method' => 'post']],
//                        ],
//                    ]);
//                }
            }
            NavBar::end();
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="container-fluid">

                <?php
                if (!Yii::$app->user->isGuest && !( \Yii::$app->session->get('curr_page') === 'home' || \Yii::$app->session->get('curr_page') === 'work' || \Yii::$app->session->get('curr_page') === 'about')) {
                    ?>
                    <div class="col-sm-2">
                        <?php
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);

                        $heading = '<i class="glyphicon glyphicon-cog"></i> Operations';
                        $type = 'success';
                        $item = Yii::$app->session->get('curr_page');
                        $type = '';

                        echo SideNav::widget([
                            'type' => SideNav::TYPE_DEFAULT,
                            'encodeLabels' => false,
                            //'heading' => $heading,
                            'indItem' => '',
                            'items' => [

                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
                                ['label' => 'Cereals', 'items' => [
                                        ['label' => 'Corn', 'items' => [
                                                ['label' => 'Registration', 'url' => Url::to(['/corn/browse/add']), 'active' => ($item == 'corn-add')],
                                                ['label' => 'Passport Data', 'icon' => 'leaf', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/corn/browse/index']), 'active' => ($item == 'corn-browse')],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/corn/view/index']), 'active' => ($item == 'corn-view')],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/corn/browse/search']), 'active' => ($item == 'corn-search')],
                                                        ['label' => '&emsp;&emsp;&emsp;Import File', 'url' => Url::to(['/corn/upload/index']), 'active' => ($item == 'corn-import')],
//\\                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
                                                ['label' => 'Characterization Data', 'icon' => 'list', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/corn/characterization/index']), 'active' => ($item === 'corn-characterization-browse' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/corn/characterization/tabs']), 'active' => ( $item === 'corn-characterization-tabs')],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/corn/characterization/search']), 'active' => ($item === 'corn-characterization-search')],
                                                        ['label' => '&emsp;&emsp;&emsp;Import File', 'url' => Url::to(['/corn/characterization/upload']), 'active' => ($item == 'corn-characterization-import')],
                                                    //    ['label' => '&emsp;&emsp;&emsp;Add Record', 'url' => Url::to(['/corn/characterization/add']), 'active' => ($item == 'corn-characterization-add')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
                                                ['label' => 'Evaluation', 'icon' => 'check', 'list', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/corn/browse/evaluation-browse']), 'active' => ($item === 'corn-evaluation-browse' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/corn/view/evaluation']), 'active' => ($item === 'corn-evaluation' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/corn/browse/evaluation-search']), 'active' => ($item === 'corn-evaluation-search')],
                                                        ['label' => '&emsp;&emsp;&emsp;Import File', 'url' => Url::to(['/corn/characterization/upload']), 'active' => ($item == 'corn-characterization-import')],
                                                    //    ['label' => '&emsp;&emsp;&emsp;Add Record', 'url' => Url::to(['/corn/characterization/add']), 'active' => ($item == 'corn-characterization-add')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
                                                ['label' => 'Inventory', 'icon' => 'folder-close', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;List', 'url' => Url::to(['/inventory/inventory/index']), 'active' => ($item == 'inventory-index')],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => "#"],
                                                    ]],
                                                //'url' => Url::to(['/inventory/inventory/index']), 'active' => ($item == 'inventory-index')],
                                                ['label' => 'Withdrawal', 'icon' => 'folder-open', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;List', 'url' => Url::to(['/withdrawal/withdrawal/index']), 'active' => ($item == 'withdrawal-index')],
                                                        ['label' => '&emsp;&emsp;&emsp;Moisture Content Determiantion', 'url' => Url::to(['/moisturecontent/moisturecontent/index']), 'active' => ($item == 'moisturecontent-index')],
                                                        ['label' => '&emsp;&emsp;&emsp;Viability Testing', 'url' => Url::to(['/viability/viability/index']), 'active' => ($item == 'viability-index')],
                                                    ]],
                                                ['label' => 'Locations', 'icon' => 'map-marker', 'url' => Url::to(['/corn/locations/index', 'type' => $type]), 'active' => ($item == '')],
//                                        ['label' => 'Characterization Data', 'icon' => 'list', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ($item == 'guest-characterization-tabs')],
//                                        ['label' => 'Search Characterization Data', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item == 'guest-characterization-search')],
                                            ]],
                                        ['label' => 'Adlay'],
                                        ['label' => 'Teosinte'],
                                        ['label' => 'Millet'],
                                        ['label' => 'Sorghum']
                                    ]],
//                                  
                            ],
                        ]);
                        ?> </div>

                    <div class="col-sm-10">
                        <?= $content ?>
                    </div>
                    <?php
                } else {
                    if (\Yii::$app->session->get('curr_page') === 'guest-view' ||
                            \Yii::$app->session->get('curr_page') === 'guest-search' ||
                            \Yii::$app->session->get('curr_page') === 'guest-view-char-data' ||
                            \Yii::$app->session->get('curr_page') === 'guest-characterization-search' ||
                            \Yii::$app->session->get('curr_page') === 'guest-characterization-tabs' ||
                            \Yii::$app->session->get('curr_page') === 'guest-browse' ||
                            \Yii::$app->session->get('curr_page') === 'guest-evaluation' ||
                            \Yii::$app->session->get('curr_page') === 'guest-evaluation-browse' ||
                            \Yii::$app->session->get('curr_page') === 'guest-evaluation-search' ||
                            \Yii::$app->session->get('curr_page') === 'guest-characterization-browse') {
                        echo '<div class="col-sm-2">';
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);

                        $heading = '<i class="glyphicon glyphicon-cog"></i> Operations';
                        $type = 'success';
                        $item = Yii::$app->session->get('curr_page');
                        $type = '';
                        ChromePhp::log('item');
                        ChromePhp::log($item);
                        echo SideNav::widget([
                            'type' => SideNav::TYPE_DEFAULT,
                            'encodeLabels' => false,
                            //'heading' => $heading,
                            'indItem' => '',
                            'items' => [

                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
                                ['label' => 'Cereals', 'items' => [
                                        ['label' => 'Corn', 'items' => [
                                                ['label' => 'Passport Data', 'icon' => 'leaf', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/guest/view/index']), 'active' => ( $item === 'guest-view')],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/guest/browse/search']), 'active' => ( $item === 'guest-search')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
                                                ['label' => 'Characterization Data', 'icon' => 'list', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/guest/characterization/index']), 'active' => ($item === 'guest-characterization-browse' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ( $item === 'guest-characterization-tabs')],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item === 'guest-characterization-search')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
                                                ['label' => 'Evaluation', 'icon' => 'check', 'list', 'items' => [
                                                        ['label' => '&emsp;&emsp;&emsp;Tabular view', 'url' => Url::to(['/guest/browse/evaluation-browse']), 'active' => ($item === 'guest-evaluation-browse' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Grid view', 'url' => Url::to(['/guest/view/evaluation']), 'active' => ($item === 'guest-evaluation' )],
                                                        ['label' => '&emsp;&emsp;&emsp;Search', 'url' => Url::to(['/guest/browse/evaluation-search']), 'active' => ($item === 'guest-evaluation-search')],
                                                     
                                                    //    ['label' => '&emsp;&emsp;&emsp;Add Record', 'url' => Url::to(['/corn/characterization/add']), 'active' => ($item == 'corn-characterization-add')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                                    ]
                                                ],
//                                        ['label' => 'Characterization Data', 'icon' => 'list', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ($item == 'guest-characterization-tabs')],
//                                        ['label' => 'Search Characterization Data', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item == 'guest-characterization-search')],
                                            ]],
                                        ['label' => 'Adlay'],
                                        ['label' => 'Teosinte'],
                                        ['label' => 'Millet'],
                                        ['label' => 'Sorghum']
                                    ]],
                            ],
                        ]);
                        ?> </div>

                    <div class="col-sm-10">
                        <?= $content ?>
                    </div>
                    <?php
                } else {
                    ?>  

                    <?= $content; ?>

                    <?php
                }
            }
            ?>




        </div>
    </div>

    <?php $this->endBody() ?>
    <br>
    <br>
    <br>  
</body>

</html>
<?php $this->endPage() ?>