<?php

namespace App\ExternalServices\Supermetrics\Api\Requests;

use App\ExternalServices\Supermetrics\Api\BaseCommand;

class Posts extends BaseCommand
{
    const REQUEST_METHOD = 'GET';

    protected $requestUri = 'assignment/posts';

    protected $parameters = [];

    /**
     * @return mixed
     * @throws \Exception
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
