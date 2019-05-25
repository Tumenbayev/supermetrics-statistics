<?php

namespace App\ExternalServices\Supermetrics\Api;

use App\ExternalServices\Supermetrics\Client;

abstract class BaseCommand implements CommandInterface
{
    protected $parameters = [];

    /**
     * @var Client
     */
    protected $client;

    /**
     * BaseCommand constructor.
     * @param Client $client
     * @param array $parameters
     */
    public function __construct(Client $client, $parameters = [])
    {
        $this->setClient($client);
        $this->setParameters($parameters);
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters($parameters = [])
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }
}
