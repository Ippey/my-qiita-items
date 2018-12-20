<?php
namespace ippey\qiita;

use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use ippey\qiita\models\Settings;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{

    public $hasCpSection = true;

    public function init()
    {
        parent::init();

        Event::on(UrlManager::class,
                UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['qiita'] = 'qiita/setting/form';
            });
    }

    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @return string|null
     * @throws \Twig_Error_Loader
     * @throws \yii\base\Exception
     */
    protected function settingsHtml()
    {
        return \Craft::$app->getView()->renderTemplate('qiita-plugin/settings', [
            'settings' => $this->getSettings(),
        ]);
    }


}