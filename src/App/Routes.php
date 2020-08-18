<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/stats', 'App\Controllers\StatisticsController:getAll');
    $group->get('/stats/country/{country}', 'App\Controllers\StatisticsController:getCountry');
});
