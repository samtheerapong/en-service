<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'authManager'=>[
            'class'=>'dektrium\rbac\components\DbManager'
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
