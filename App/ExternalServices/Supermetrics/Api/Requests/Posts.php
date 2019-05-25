<?php

namespace App\ExternalServices\Supermetrics\Api\Requests;

use App\ExternalServices\Supermetrics\Api\BaseCommand;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Posts extends BaseCommand
{
    protected $requestUri = 'assignment/posts';

    const REQUEST_METHOD = 'GET';
    
    protected $parameters = [];

    /**
     * @return bool|\Psr\Http\Message\StreamInterface
     */
    public function execute()
    {
        return $this->client->request(self::REQUEST_METHOD, $this->getRequestUri(), $this->getParameters());
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return 'https://' . getenv('API_BASE_URL') . '/' . $this->requestUri;
    }

    /**
     * Will take only available parameters
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}