<?php
/**
 * Created by PhpStorm.
 * User: attek
 * Date: 2018/07/19
 * Time: 12:15
 */

namespace attek\ptesaml\assets;


class HelpAssets extends AssetBundle {


	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@attek/text/assets';
	/**
	 * @inheritdoc
	 */
	public $js = [
		'popup.js',
	];
	/**
	 * @inheritdoc
	 */
	public $depends = [
		'yii\web\JqueryAsset',
	];
}