<?php

require_once __DIR__ . '/../app/vendor/autoload.php';
use app\core\Application;

$app = new Application(dirname(__DIR__).'/app');

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');

$app->run();
