<?php namespace Tonda\Workshop\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class HelloController
{

    public function __construct(private readonly PhpRenderer $renderer)
    {
        $this->renderer->setTemplatePath('src/templates');
        $this->renderer->setLayout('layout.html');
    }

    public function hello(Request $request, Response $response): Response
    {
        $args['title'] = 'Hello...';
        $args['name'] = $request->getAttribute('name');
        return $this->renderer->render($response, "hello.html", $args);
    }

    public function reverse(Request $request, Response $response): Response
    {
        $args['title'] = 'Reverse Hello';

        // reverse the name
        $args['name'] = strrev($request->getAttribute('name'));

        return $this->renderer->render($response, "hello.html", $args);
    }

    public function form(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();
        $args['title'] = 'Form Hello';
        $args['name'] = $body['name'];

        return $this->renderer->render($response, "hello.html", $args);
    }
}
