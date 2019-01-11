<?php

namespace ippey\MyQiitaItems\components;


use GuzzleHttp\Client;
use ippey\MyQiitaItems\models\Item;
use ippey\MyQiitaItems\models\Settings;
use ippey\MyQiitaItems\Plugin;

/**
 * Class QiitaService
 * @package ippey\MyQiitaItems\components
 */
class QiitaService
{
	private $baseUri = 'https://qiita.com';

	/**
	 * get my items from Qiita
	 *
	 * @param string $page
	 * @param string $perPage
	 * @return array
	 */
	public function items($page = '', $perPage = '')
	{
		/** @var Settings $settings */
		$settings = Plugin::getInstance()->getSettings();
		$token = $settings->token;
		if (empty($token)) {
		    return [];
        }

		$url = '/api/v2/authenticated_user/items';
		$query = [];
		if (!empty($page)) {
			$query['page'] = $page;
		}
		if (!empty($perPage)) {
			$query['per_page'] = $perPage;
		}

		$client = new Client([
			'base_uri' => $this->baseUri,
		]);
		$response = $client->get($url, [
			'headers' => [
				'Authorization' => 'Bearer ' . $token,
			],
			'query' => $query,
		]);
		$body = (string)$response->getBody();
		$json = json_decode($body);
		$items = [];
		foreach ($json as $row) {
			/** @var object $row */
			$item = new Item();
			$item->rendered_body = $row->rendered_body;
			$item->body = $row->body;
			$item->coediting = $row->coediting;
			$item->comments_count = $row->comments_count;
			$item->created_at = $row->created_at;
			$item->group = $row->group;
			$item->id = $row->id;
			$item->likes_count = $row->likes_count;
			$item->private = $row->private;
			$item->reactions_count = $row->reactions_count;
			$item->tags = $row->tags;
			$item->title = $row->title;
			$item->updated_at = $row->updated_at;
			$item->url = $row->url;
			$item->user = $row->user;
			$item->page_views_count = $row->page_views_count;

			$items[] = $item;
		}
		return $items;
	}
}
