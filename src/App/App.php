<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/covid19stats-php-server/public');

/* Routes */
require __DIR__ . '/Routes.php';

$app->run();