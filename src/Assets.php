<?php
/**
 * Date: 17.01.14
 * Time: 1:06
 */

namespace egor260890\sort;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@egor260890/sort';

    public $js = [
		'js/sort.js',
    ];

    public $css = [
        'css/_sort.min.css',
    ];

	public $depends = [
		'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	];
}