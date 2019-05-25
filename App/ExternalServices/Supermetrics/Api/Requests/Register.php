<?php

namespace App\ExternalServices\Supermetrics\Api\Requests;

use App\ExternalServices\Supermetrics\Api\BaseCommand;

class Register extends BaseCommand
{
    const REQUEST_METHOD = 'POST';

    protected $requestUri = 'assignment/register';

    protected $parameters = [];

    /**
     * @throws \Exception
     */
    public function execute()
    {
        $_SESSION['API_TOKEN'] =
            $this->client->request(
                self::REQUEST_METHOD,
                $this->getRequestUri(),
                $this->getParameters()
            )['data']['sl_token'];
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
        return [
            'form_params' => [
                'client_id' => getenv('CLIENT_ID'),
                'email' => getenv('CLIENT_EMAIL'),
                'name' => getenv('CLIENT_NAME'),
            ],
        ];
    }
}
