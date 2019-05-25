<?php

namespace App\ExternalServices\Supermetrics\Api;

/**
 * Interface CommandInterface
 * @package App\ExternalServices\Supermetrics\Api
 */
interface CommandInterface
{
    public function execute();

    public function getRequestUri();
}
