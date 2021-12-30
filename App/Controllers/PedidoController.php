<?php

namespace App\Controllers;

use App\Model\Pedido;
use App\Model\PedidoDAO;
use App\View;

class PedidoController
{
	private function getAllPedidos()
	{
		$pedidosDao = new PedidoDAO;
		$lista = $pedidosDao->getAllPedidos();
		print_r($lista);
		return View::render('pedidos', [
		]);
	}
	public function listPedidos()
	{
	}

	public function addPedido()
	{
		$pedido = new Pedido;
		$pedido->setData(date("Y-m-d"));
		$pedido->setIdCliente($_POST['idCliente']);
		$pedido->setTotal($_POST['total']);
		$pedidoDao = new PedidoDAO;
		$pedidoDao->addPedido($pedido);

		return "inserido";
	}
}
