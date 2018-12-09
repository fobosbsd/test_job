<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en',
    'language' => 'en',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'i18n' => [
            'translations' => [
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'fileMap' => [
                        'backend' => 'backend.php'
                    ],
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php'
                    ],
                ],
            ],
        ],
        'parameters' => 'common\components\Parameters',
    ],
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ],
    ],
];
