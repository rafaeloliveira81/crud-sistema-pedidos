<?php

use App\Controllers\ClienteController;
use App\Controllers\HomeController;
use App\Controllers\ProdutoController;
use App\Router;

require __DIR__ . '/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';
$router = new Router($method, $path);

$router->get('/', function () 
{
	echo HomeController::getHome();
});

$router->get('/clientes', function ()
{
	$cliente = new ClienteController;
	echo $cliente->listCliente();
});

$router->get('/cliente', function () 
{
	$cliente = new ClienteController;
	echo $cliente->getCliente($_GET);
});

$router->post('/cliente-cadastro', function () 
{
	$cliente = new ClienteController;
	echo $cliente->addCliente($_POST);
});

$router->get('/produtos', function ()
{
	$produto = new ProdutoController;
	echo $produto->listProduto();
});

$router->get('/produto', function ()
{
	$produto = new ProdutoController;
	echo $produto->getProduto();
});

$router->post('/produto-cadastro', function ()
{
	$produto = new ProdutoController;
	echo $produto->addProduto($_POST);
});

$result = $router->handler();

if (!$result)
{
	http_response_code(404);
	echo 'Página não encontrada';
	die();
}

echo $result();
