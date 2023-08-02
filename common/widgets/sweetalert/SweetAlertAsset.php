<?php

namespace common\widgets\sweetalert;


use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    /** @var string $sourcePath  */
    public $sourcePath = '@bower/sweetalert2';

    /** @var array $css */
    public $css = [
        'dist/sweetalert2.css',
    ];

    /** @var array $js */
    public $js = [
        'dist/sweetalert2.js',
    ];

    /** @var array $depends */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}