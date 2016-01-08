<head>
    <style>
        .nav-tabs.nav-stacked.nav-condensed > li > a {
            padding-top: 4px; 
            padding-bottom: 4px; 
        }
    </style>
</head>

<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
                'brandLabel' => 'PHLGRIMS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                //'class' => 'navbar-black navbar-fixed-top nav-condensed',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        // ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'Login', 'url' => ['/site/login']],
                    ],
                ]);
            } else {
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'encodeLabels' => false,
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'Resources',
                            'items' => [
                                ['label' => 'Corn', 'url' => ['/catalog/browse']],
                            //['label' => '<span class="mdi-action-language"></span>Resources', 'url' => ['/docs']],
                            ],
                        ],
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                    ],
                ]);
            }
            NavBar::end();
            ?>
            <br>
            <br>
            <br>
            <br>
            <div class="container-fluid">

                <div class="col-sm-3">

                    <?php

                    use kartik\widgets\SideNav;
                    use yii\helpers\Url;

if (!Yii::$app->user->isGuest) {
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);

                        $heading = '<i class="glyphicon glyphicon-cog"></i> Operations';
                        $type = 'success';
                        $item = Yii::$app->session->get('curr_page');
                        $type = '';
                        echo SideNav::widget([
                            'type' => SideNav::TYPE_SUCCESS,
                            'encodeLabels' => false,
                            //'heading' => $heading,
                            'items' => [
                                // Important: you need to specify url as 'controller/action',
                                // not just as 'controller' even if default action is used.
                                ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site', 'type' => $type]), 'active' => ($item == 'home')],
                                //label' => 'Catalog', 'icon' => 'book', 'items' => [
                                ['label' => 'Corn', 'items' => [
                                        ['label' => 'Passport Data', 'url' => Url::to(['/catalog/browse/index']), 'active' => ($item == 'catalog-browse')],
                                        ['label' => 'Import', 'url' => Url::to(['/catalog/upload/index']), 'active' => ($item == 'catalog-import')],
                                    ]],
//                                    ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
//                                            ['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type' => $type]), 'active' => ($item == 'online-1')],
//                                            ['label' => 'Online 2', 'url' => Url::to(['/site/online-2', 'type' => $type]), 'active' => ($item == 'online-2')]
//                                        ]],
                            // ]],
//                            ['label' => '<span class="pull-right badge">3</span> Categories', 'icon' => 'tags', 'items' => [
//                                    ['label' => 'Fiction', 'url' => Url::to(['/site/fiction', 'type' => $type]), 'active' => ($item == 'fiction')],
//                                    ['label' => 'Historical', 'url' => Url::to(['/site/historical', 'type' => $type]), 'active' => ($item == 'historical')],
//                                    ['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
//                                            ['label' => 'Event 1', 'url' => Url::to(['/site/event-1', 'type' => $type]), 'active' => ($item == 'event-1')],
//                                            ['label' => 'Event 2', 'url' => Url::to(['/site/event-2', 'type' => $type]), 'active' => ($item == 'event-2')]
//                                        ]],
//                                ]],
//                            ['label' => 'Profile', 'icon' => 'user', 'url' => Url::to(['/site/profile', 'type' => $type]), 'active' => ($item == 'profile')],
                            ],
                        ]);
                    }
                    ?>
                </div>

                <div class="col-sm-9">
                    <?= $content ?>
                </div>
            </div>
        </div>

        <?php $this->endBody() ?>
        <br>
        <br>
        <br>  
    </body>

</html>
<?php $this->endPage() ?>
