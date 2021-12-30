<?php

namespace App\Controllers;

use App\Model\Cliente;
use App\Model\ClienteDAO;
use App\View;

class ClienteController extends Page
{
	private static function getClientes()
	{
		$itens = '';
		$clienteDao = new ClienteDAO;
		$result = $clienteDao->getAllClientes();

		foreach($result as $key => $value) {
			$itens .= View::render('itens_cliente', [
				'id'	 => $value['codigo'],
				'nome' => $value['nome'],
				'cpf'	 => $value['cpf'],
			]);
		}
		return $itens;
	}

	public static function listCliente()
	{
		$content = View::render('clientes', [
			'itens' => self::getClientes()
		]);

		return Page::getPage('Sistema de Pedidos :: Clientes', $content);
	}

	public function getCliente() 
	{
		$content = View::render('cadastro_cliente');
		return Page::getPage('Sistema de Pedidos :: Clientes > Cadastro', $content);
	}

	public function updateCliente($id)
	{
		$clienteDao = new ClienteDAO;
		$cliente = $clienteDao->getClienteId($id);
		print_r($cliente);
	}

	public function addCliente($data) 
	{
		$cliente = new Cliente;
		$cliente->setNome($data['name']);
		$cliente->setCpf($data['cpf']);
		$clienteDao = new ClienteDAO;
		$clienteDao->addCliente($cliente);

		return "
			<script>
				alert('Cadastrado com sucesso')
				window.location.href='http://localhost:3000/clientes'
			</script>";
	}

	public function delCliente()
	{
		$content = View::render('deletar-cliente');
		return Page::getPage('Sistema de Pedidos :: Clientes > Deletar', $content);
	}
}
