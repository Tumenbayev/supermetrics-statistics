<?php

namespace App\ExternalServices\Supermetrics;

use GuzzleHttp;

/**
 * Class Client
 * @package App\ExternalServices\Supermetrics
 */
class Client
{
    private $clientId;
    private $apiToken;
    private $url;

    const API_TOKEN_KEY = 'sl_token';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->clientId = getenv('CLIENT_ID');
        $this->apiToken = getenv('API_TOKEN');
        $this->url = getenv('API_BASE_URL');
    }

    /**
     * @param $method
     * @param $url
     * @param array $options
     * @return bool|\Psr\Http\Message\StreamInterface
     */
    public function request($method, $url, $options = [])
    {
        $client = new GuzzleHttp\Client();

        try {
            $options['query'][self::API_TOKEN_KEY] = $this->apiToken;
            $result = $client->request($method, $url, $options);
        } catch (\Exception $e) {
            var_dump($e->getCode(), $e->getMessage());
            die();
        }

        return json_decode($result->getBody(), true);
    }
}
