<?php

namespace smart\catalog\backend\assets;

use yii\web\AssetBundle;

class CategoryFormAsset extends AssetBundle
{

	public $js = [
		'category-form.js',
	];
	
	public $css = [
		'category-form.css',
	];
	
	public $depends = [
		'yii\bootstrap4\BootstrapPluginAsset',
	];

	public function init()
	{
		$this->sourcePath = __DIR__ . '/category-form';
	}

}
