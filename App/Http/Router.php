<?php
use NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'App\Http\Controllers\PostController@index');
Macaw::get('/statistics', 'App\Http\Controllers\PostController@statistics');

Macaw::dispatch();