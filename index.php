<?php 

require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use GuzzleHttp\Client;

$api_key = getenv('CLAVE_OPEN');


$app = new \Slim\App;

$app->get('/clima/{id}', function(Request $request, Response $response, array $agrs) use($app, $api_key){
	$client = new Client();

	$id = $agrs['id'];

	$url = "http://api.openweathermap.org/data/2.5/weather?id=".$id."&APPID=".$api_key."&units=metric";

	$response = $client->get($url);

	return $response;
});

$app->run();