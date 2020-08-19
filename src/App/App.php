<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

/* Routes */
require __DIR__ . '/Routes.php';

$app->run();