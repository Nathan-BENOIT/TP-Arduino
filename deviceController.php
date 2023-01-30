<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

function getObjectById(mixed $id)
{
}

function getObjects()
{

}
function saveObject(object|array|null $data)
{

}

$app->get('/device', function (Request $request, Response $response) {
    $objects = getObjects(); // une fonction qui récupère la liste de device
    $response->getBody()->write(json_encode($objects));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/device/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $object = getObjectById($id); // une fonction qui récupère les devices par ID
    $response->getBody()->write(json_encode($object));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/digital/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $object = getObjectById($id); // une fonction qui récupère les devices par ID
    $response->getBody()->write(json_encode($object));
    return $response->withHeader('Content-Type', 'application/json');
});


$app->post('/digital', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    saveObject($data); // une fonction qui enregistre l'objet
    $response->getBody()->write(json_encode(['success' => true]));
    return $response->withHeader('Content-Type', 'application/json');
});


$app->run();
