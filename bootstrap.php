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
	if(isset($_GET['id']))
	{
		$clienteId = $cliente->getClienteId($_GET['id']);
		echo $cliente->editCliente($clienteId);
		die();
	}
	echo $cliente->getCliente();
});

$router->post('/cliente-cadastro', function () 
{
		$cliente = new ClienteController;
		echo $cliente->addCliente($_POST);
});

$router->post('/cliente-atualizar', function () 
{
		$cliente = new ClienteController;
		echo $cliente->updateCliente($_POST);
});

$router->get('/cliente-deletar', function ()
{
	$cliente = new ClienteController;
	echo $cliente->getDelCliente($_GET['id']);
});

$router->post('/cliente-deletar', function () 
{
	$cliente = new ClienteController;
	echo $cliente->delCliente($_POST);
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

$router->get('/produto-atualizar', function ()
{
	$produto = new ProdutoController;
	echo $produto->editProduto($_GET['id']);
});

$result = $router->handler();

if (!$result)
{
	http_response_code(404);
	echo 'Página não encontrada';
	die();
}

echo $result();
