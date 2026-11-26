<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Main application asset bundle for MusikZone.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap',
        'css/styles.css',
    ];
    public $js = [
        'js/data.js',
        'js/app.js',
    ];
    public $jsOptions = [
        'position' => View::POS_END,
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
