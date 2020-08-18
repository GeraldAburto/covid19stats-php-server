<?php

namespace APP\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

define('ROOT_PATH', dirname(__DIR__).'/');
require_once ROOT_PATH.'/Services/RepidAPIService.php';

class StatisticsController
{
    public function getAll(Request $request, Response $response, $args)
    {
        $rapidAPIService = new  \App\Services\RapidAPIService();
        $stats = $rapidAPIService->getStats();
        $response->getBody()->write($stats);
        return $response;
    }
}
