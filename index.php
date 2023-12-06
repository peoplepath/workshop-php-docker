<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Tonda\Workshop\Controller\HelloController;

require __DIR__ . '/vendor/autoload.php';

$app = \DI\Bridge\Slim\Bridge::create();

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);


$app->get('/hello/{name}', [HelloController::class, 'hello']);
$app->get('/hello-rev/{name}', [HelloController::class, 'reverse']);
$app->post('/hello-post', [HelloController::class, 'form']);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('<form method="post" action="hello-post"><input type="text" name="name"><button type="submit">Odeslat</button></form>');
    return $response;
});

$app->run();
