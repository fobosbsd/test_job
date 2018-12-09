<?php

use yii\web\UrlNormalizer;

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'sourceLanguage' => 'en',
    'language' => 'en',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'baseUrl' => '',
            'enableCsrfValidation' => true,
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => UrlNormalizer::ACTION_REDIRECT_PERMANENT,
            ],
            'rules' => [
                '' => 'site/index',
                '<action>' => 'site/<action>',
                '<controller>' => '<controller>/home',
                '<module:[\w-]+>/<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
                '<module:[\w-]+>/<folder:[\w-]+>/<controller:[\w-]+>/<action:[\w-]+>' => '<module>/<folder>/<controller>/<action>',
                '<module:[\w-]+>/<controller:[\w-]+>/<action:[\w-]+>' => '<module>/<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
            ]
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
            'timeFormat' => 'php:H:i',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'UTC'
        ],
        'parameters' => 'common\components\Parameters',
    ],
    'modules' => [
        'settings' => [
            'class' => 'backend\modules\settings\Module',
        ],
    ],
    'params' => $params,
];
