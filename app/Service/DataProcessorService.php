<?php

namespace App\Service;

use GuzzleHttp\Client;


class DataProcessorService
{
	protected $url = 'data-processor-service:8000';
	protected $client;

	public function __construct()
	{
		$this->client = new Client();
	}

	public function sendPostRequest($userId, $cookieId, $productId)
	{
		$data = [
			'user_id' => $userId,
			'cookie_id' => $cookieId,
			'product_id' => $productId,
		];
		$url = $this->url . '/api/v1/product-interaction';
		$response = $this->client->post($url, [
			'json' => $data,
		]);
		return $response->getBody()->getContents();
	}
}