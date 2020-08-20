<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

$app->add(function ($request, $handler) {
    $allowedOrigins = [
        'https://geraldaburto.github.io',
        'http://localhost:3000'
    ];

    $origin = $request->header('origin');

    if (in_array($origin, $allowedOrigins) == false)
        $origin = 'https://geraldaburto.github.io';

    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', $origin)
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET');
});

/* Routes */
require __DIR__ . '/Routes.php';

$app->run();
