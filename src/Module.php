<?php

namespace attek\text;

/**
 * text module definition class
 */
class Module extends \yii\base\Module
{

	public $userClass;
	/**
	 * {@inheritdoc}
	 */
	public function init()
	{

		if (!isset(\Yii::$app->i18n->translations['pte-text'])) {
			\Yii::$app->i18n->translations['pte-text'] = [
				'class' => 'yii\i18n\PhpMessageSource',
				'sourceLanguage' => 'en',
				'basePath' => '@attek/text/messages',
			];
		}

		parent::init();
	}
}
