<?php

namespace ippey\MyQiitaItems;

use craft\web\twig\variables\CraftVariable;
use ippey\MyQiitaItems\components\QiitaService;
use ippey\MyQiitaItems\models\Settings;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{

	public bool $hasCpSettings = true;

	public function init()
	{
		parent::init();

		Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function (Event $e) {
			/** @var CraftVariable $variable */
			$variable = $e->sender;

			// Attach a service:
			$variable->set('my_qiita', QiitaService::class);
		});
	}

	protected function createSettingsModel(): Settings
	{
		return new Settings();
	}

	/**
	 * @return string|null
	 * @throws \Twig_Error_Loader
	 * @throws \yii\base\Exception
	 */
	protected function settingsHtml(): ?string
	{
		return \Craft::$app->getView()->renderTemplate('my-qiita-items/settings', [
			'settings' => $this->getSettings(),
		]);
	}


}
