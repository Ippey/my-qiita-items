<?php

namespace ippey\MyQiitaItems\models;


use craft\base\Model;

/**
 * Class Settings
 * @package ippey\MyQiitaItems\models
 */
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
