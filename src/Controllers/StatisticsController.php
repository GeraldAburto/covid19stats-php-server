<?php

namespace APP\Controllers;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

define('ROOT_PATH', dirname(__DIR__) . '/');
require_once ROOT_PATH . '/Services/RepidAPIService.php';

class StatisticsController
{
    public function getAll(Request $request, Response $response, $args)
    {
        try {
            $rapidAPIService = new  \App\Services\RapidAPIService();
            $statsResponse = $rapidAPIService->getstats();

            if ($statsResponse->code != 200)
                return $response->withStatus($statsResponse->code);

            $params = $request->getQueryParams();
            $search = null;
            if (sizeof($params) > 0)
                $search = $params['search'];

            $map = array();
            $stats = $statsResponse->body;
            $continents = $stats->response;

            if ($search != null && strlen($search) > 0)
                $continents = array_values(array_filter($continents, function ($country) use ($search) {
                    return (preg_match("/{$search}/i", $country->continent) ||
                        preg_match("/{$search}/i", $country->country));
                }));

            for ($i = 0; $i < sizeof($continents); $i++) {
                $country = $continents[$i];
                $continent = $country->continent;

                if ($continent == null)
                    $continent = 'Unknown';

                if (array_key_exists($continent, $map)) {
                    array_push($map[$continent], $country);
                } else {
                    $map[$continent] = array($country);
                }
            }

            if (sizeof($map) == 0){
                $response->getBody()->write("Not Found");
                return $response->withStatus(404);
            }

            $payload = json_encode($map);


            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (Exception $e) {
            $response->getBody()->write($e->getMessage());
            return $response->withStatus(500);
        }
    }
}
