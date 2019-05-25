<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Dotenv\Dotenv;

$dotenv = DotEnv::create(__DIR__);
$dotenv->load();

require_once(__DIR__ . '/App/Http/Router.php');
