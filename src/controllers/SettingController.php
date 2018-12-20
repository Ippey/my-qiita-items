<?php
/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2018-12-13
 * Time: 17:20
 */

namespace ippey\qiita\controllers;


use craft\web\Controller;

class SettingController extends Controller
{
    /**
     * @throws \yii\web\ForbiddenHttpException
     */
    public function init()
    {
        parent::init();
        $this->requirePermission('admin');
    }


    public function formAction()
    {
        $params = [

        ];
        return $this->renderTemplate('form.twig.html', $params);
    }
}