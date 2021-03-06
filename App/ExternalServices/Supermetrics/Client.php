<?php

namespace App\ExternalServices\Supermetrics;

use GuzzleHttp;

/**
 * Class Client
 * @package App\ExternalServices\Supermetrics
 */
class Client
{
    const API_TOKEN_KEY = 'sl_token';

    const METHOD_GET = 'GET';

    const METHOD_POST = 'POST';

    protected $clientId;

    protected $apiToken;

    protected $url;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->clientId = getenv('CLIENT_ID');
        $this->apiToken = $_SESSION['API_TOKEN'] ?? getenv('API_TOKEN');
        $this->url = getenv('API_BASE_URL');
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws \Exception
     */
    public function request(string $method, string $url, array $options = [])
    {
        $client = new GuzzleHttp\Client();

        try {
            $options['query'][self::API_TOKEN_KEY] = $this->apiToken;
            $result = $client->request($method, $url, $options);
        } catch (\Exception $e) {
            throw $e;
        }

        return json_decode($result->getBody(), true);
    }
}
