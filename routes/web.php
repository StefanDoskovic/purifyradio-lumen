<?php

$router->get('token', 'AuthController@token');

$router->group(['middleware' => 'auth'], function () use ($router) {
    
    $router->get("/stations", 'RadioStationController@getStations');
    
});