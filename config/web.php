<?php

Yii::setAlias('@themes', dirname('_DIR_') . '/themes');
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'PCGRID',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii','app\components\Bootstrap',],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'uploader' => [
            'class' => 'app\modules\uploader\UploaderModule',
        ],
        'users' => [
            'class' => 'app\modules\users\Module',
        ],
        'corn' => [
            'class' => 'app\modules\corn\GermplasmModule',
        ],
        'guest' => [
            'class' => 'app\modules\guest\GermplasmModule',
        ],
        'characterizationData' => [
            'class' => 'app\modules\characterizationData\GermplasmModule',
        ],
        'inventory' => [
            'class' => 'app\modules\inventory\InventoryModule',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other module settings
        ],
        'book' => [
            'class' => 'app\modules\book\BookModule',
        ],
        'inventory' => [
            'class' => 'app\modules\inventory\Inventory',
        ],
        'withdrawal' => [
            'class' => 'app\modules\withdrawal\withdrawal',
        ],
        'regeneration' => [
            'class' => 'app\modules\regeneration\regeneration',
        ],
        'moisturecontent' => [
            'class' => 'app\modules\moisturecontent\moisturecontent',
        ],
        'viability' => [
            'class' => 'app\modules\viability\viability',
        ],
    ],
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r=routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
        'request' => [
            'cookieValidationKey' => 'aOChjQp2uJytuv5VDVsntcBr7aG8vVfU',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@app/views'
                 ],
             ],
        ],
        'assetManager' => [
            'linkAssets' => true,
        ], 
    ],
//    'as beforeRequest' => [
//        'class' => 'yii\filters\AccessControl',
//        'rules' => [
//            [
//                'actions' => ['login', 'error'],
//                'allow' => true,
//            ],
//            [
//
//                'allow' => true,
//                'roles' => ['@'],
//            ],
//        ],
//    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 
        [
            'class' => 'yii\gii\Module',
            'generators' => 
            [ //here
                'crud' => 
                [
                    'class' => 'yii\gii\generators\crud\Generator',
                    'templates' => 
                        [
                            'adminlte' => '@vendor/dmstr/yii2-adminlte-asset/gii/templates/crud/simple',
                        ]
                ]
            ],
        ];
}

return $config;
