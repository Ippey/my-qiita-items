<?php
/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2018-12-13
 * Time: 17:24
 */

namespace ippey\qiita\models;


use craft\base\Model;

class Settings extends Model
{
    public $token = '';

    public function rules()
    {
        return [
            [['token'], 'required'],
        ];
    }


}