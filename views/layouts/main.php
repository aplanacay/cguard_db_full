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
                'brandLabel' => 'CGUARD',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    //'style'=>'height:80;width:100',
                    'class' => 'navbar-inverse navbar-fixed-top',
                //'class' => 'navbar-black navbar-fixed-top nav-condensed',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'ABOUT US', 'url' => ['/site/about']],
                        ['label' => 'OUR PEOPLE', 'url' => ['/site/people']],
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
                            ['label' => 'OUR PEOPLE', 'url' => ['/site/people']],
                            ['label' => 'OUR WORK', 'url' => ['/site/work']],
                            ['label' => 'Crop Group',
                                'items' => [
                                    ['label' => 'Cereal',
                                        'items' => [
                                            ['label' => 'Corn', 'url' => ['/corn/browse']],
                                        //['label' => '<span class="mdi-action-language"></span>Resources', 'url' => ['/docs']],
                                        ]
                                    ]
                                ],
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
                if (!Yii::$app->user->isGuest) {
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
//                        echo SideNav::widget([
//                            'type' => SideNav::TYPE_SUCCESS,
//                            'encodeLabels' => false,
//                            //'heading' => $heading,
//                            'items' => [
//                                // Important: you need to specify url as 'controller/action',
//                                // not just as 'controller' even if default action is used.
//                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
//                                //label' => 'Catalog', 'icon' => 'book', 'items' => [
//                                ['label' => 'Corn', 'items' => [
//                                        ['label' => 'Passport Data', 'url' => Url::to(['/corn/browse/index']), 'active' => ($item == 'corn-browse')],
//                                        ['label' => 'Import File', 'url' => Url::to(['/corn/upload/index']), 'active' => ($item == 'corn-import')],
//                                        ['label' => 'Add Record', 'url' => Url::to(['/corn/browse/add']), 'active' => ($item == 'corn-add')],
//                                    ]],
////                                  
//                            ],
//                        ]);
                        echo SideNav::widget([
                            'type' => SideNav::TYPE_DEFAULT,
                            'encodeLabels' => false,
                            //'heading' => $heading,
                            'items' => [

                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
                                ['label' => 'Corn', 'items' => [
                                        ['label' => 'Passport Data', 'icon' => 'leaf', 'items' => [
                                                ['label' => 'Browser', 'url' => Url::to(['/corn/browse/index']), 'active' => ($item == 'corn-browse')],
                                                ['label' => 'Viewer', 'url' => Url::to(['/corn/browse/index']), 'active' => ($item == 'corn-view')],
                                                ['label' => 'Import File', 'url' => Url::to(['/corn/upload/index']), 'active' => ($item == 'corn-import')],
                                                ['label' => 'Add Record', 'url' => Url::to(['/corn/browse/add']), 'active' => ($item == 'corn-add')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                            ]
                                        ],
                                        ['label' => 'Characterization Data', 'icon' => 'list', 'items' => [
                                                ['label' => 'Browser', 'url' => Url::to(['/guest/characterization/index']), 'active' => ($item === '' )],
                                                ['label' => 'Viewer', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ( $item === 'guest-characterization-tabs')],
                                                ['label' => 'Search', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item === 'guest-characterization-search')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                            ]
                                        ],
                                        ['label' => 'Locations', 'icon' => 'map-marker', 'url' => Url::to(['/guest/location/index', 'type' => $type]), 'active' => ($item == '')],
                                    
//                                        ['label' => 'Characterization Data', 'icon' => 'list', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ($item == 'guest-characterization-tabs')],
//                                        ['label' => 'Search Characterization Data', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item == 'guest-characterization-search')],
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
                    if (\Yii::$app->session->get('curr_page') === 'guest-view-pass-data' || \Yii::$app->session->get('curr_page') === 'guest-view-char-data' || \Yii::$app->session->get('curr_page') === 'guest-characterization-search' || \Yii::$app->session->get('curr_page') === 'guest-characterization-tabs' || \Yii::$app->session->get('curr_page') === 'guest-browse') {
                        echo '<div class="col-sm-2">';
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);

                        $heading = '<i class="glyphicon glyphicon-cog"></i> Operations';
                        $type = 'success';
                        $item = Yii::$app->session->get('curr_page');
                        $type = '';
                        ChromePhp::log($item);
                        echo SideNav::widget([
                            'type' => SideNav::TYPE_DEFAULT,
                            'encodeLabels' => false,
                            //'heading' => $heading,
                            'items' => [

                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
                                ['label' => 'Corn', 'items' => [
                                        ['label' => 'Passport Data', 'icon' => 'leaf', 'items' => [
                                                ['label' => 'Browser', 'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' )],
                                                ['label' => 'Viewer', 'url' => Url::to(['/guest/view/index']), 'active' => ( $item === 'guest-view-char-data')],
                                                ['label' => 'Search', 'url' => Url::to(['/guest/browse/index']), 'active' => ''],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                            ]
                                        ],
                                        ['label' => 'Characterization Data', 'icon' => 'list', 'items' => [
                                                ['label' => 'Browser', 'url' => Url::to(['/guest/characterization/index']), 'active' => ($item === '' )],
                                                ['label' => 'Viewer', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ( $item === 'guest-characterization-tabs')],
                                                ['label' => 'Search', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item === 'guest-characterization-search')],
//                                                'url' => Url::to(['/guest/browse/index']), 'active' => ($item === 'guest-browse' || $item === 'guest-view-char-data')
                                            ]
                                        ],
//                                        ['label' => 'Characterization Data', 'icon' => 'list', 'url' => Url::to(['/guest/characterization/tabs']), 'active' => ($item == 'guest-characterization-tabs')],
//                                        ['label' => 'Search Characterization Data', 'url' => Url::to(['/guest/characterization/search']), 'active' => ($item == 'guest-characterization-search')],
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
