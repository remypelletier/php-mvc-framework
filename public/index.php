<?php

require_once __DIR__ . '/../app/vendor/autoload.php';
use app\core\Application;

$app = new Application();

$app->router->get('/', function() {
    return 'Hello world';
});
$app->router->get('/contact', function() {
    return 'Contact';
});

$app->run();
