<?php

namespace App\Repositories;

use App\ExternalServices\Supermetrics\Api\CommandInterface;
use App\ExternalServices\Supermetrics\Client;

/**
 * Class ApiRepository
 * @package App\Repositories
 */
abstract class ApiRepository extends BaseRepository
{
    protected $postParameters = [];

    protected $getParameters = [];

    /**
     * @param array $input
     * @return mixed
     */
    abstract public function fromArray(array $input = []);

    /**
     * @param array $parameters
     * @return $this
     */
    public function setGetParameters($parameters = [])
    {
        $this->getParameters = $parameters;

        return $this;
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function setPostParameters($parameters = [])
    {
        $this->postParameters = $parameters;

        return $this;
    }

    /**
     * Api request
     *
     * @param  string  $method
     * @return array|string
     */
    protected function apiQuery($method)
    {
        $command = $this->getCommand($method, $this->getRequestOptions());

        return $command->execute();
    }

    /**
     * Will choose command depends on method
     *
     * @param $method
     * @param array $parameters
     * @return CommandInterface|null
     */
    protected function getCommand($method, $parameters = [])
    {
        $commandClass = 'App\ExternalServices\Supermetrics\Api\Requests\\' . ucfirst($method);
        $result = null;

        if (class_exists($commandClass)) {
            $result = new $commandClass((new Client()), $parameters);
        }

        return $result;
    }

    /**
     * @return array
     */
    protected function getRequestOptions(): array
    {
        return [
            'form_params' => $this->postParameters,
            'query' => $this->getParameters,
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function isResponseValid(array $data): bool
    {
        return !empty($data) || !is_array($data) || !array_key_exists('error', $data) && array_key_exists('data', $data);
    }
}