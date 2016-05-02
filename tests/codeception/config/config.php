<?php
/**
 * Application configuration shared by all applications and test types
 */
return [
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'fixtureDataPath' => '@tests/codeception/common/fixtures/data',
            'templatePath' => '@tests/codeception/common/templates/fixtures',
            'namespace' => 'tests\codeception\common\fixtures',
        ],
    ],
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=yii2_advanced_tests',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'i18n' => [
            'translations' => [
                'test' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@tests/codeception/common/messages',
                    //'sourceLanguage' => 'en-US',
                ],
            ],
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
