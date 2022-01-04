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

	public function getClienteId($id)
	{
		$clienteDao = new ClienteDAO;
		$cliente = $clienteDao->getClienteId($id);
		return $cliente;
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

	public function editCliente($clienteId)
	{
		$content = View::render('editar_cliente', [
			'codigo' => $clienteId['codigo'],
			'nome' => $clienteId['nome'],
			'cpf' => $clienteId['cpf']
		]);
		return Page::getPage('Sistema de Pedidos :: Clientes > Cadastro', $content);
	}

	public function updateCliente($data)
	{
		$cliente = new Cliente;
		$cliente->setNome($data['nome']);
		$cliente->setCpf($data['cpf']);
		$clienteDao = new ClienteDAO;
		$clienteDao->updateCliente($data['codigo'],$cliente);

		return "
			<script>
				alert('Editado com sucesso')
				window.location.href='http://localhost:3000/clientes'
			</script>";
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

	public function getDelCliente($id)
	{
		$clienteId = $this->getClienteId((int)$id);
		$content = View::render('deletar-cliente', [
			'codigo' => $clienteId['codigo'],
			'nome' => $clienteId['nome'],
			'cpf' => $clienteId['cpf']
		]);
		return Page::getPage('Sistema de Pedidos :: Clientes > Deletar', $content);
	}

	public function delCliente($data)
	{
		$clienteDao = new ClienteDAO;
		$clienteDao->delCliente($data['codigo']);

		return "
			<script>
				alert('Excluido com sucesso')
				window.location.href='http://localhost:3000/clientes'
			</script>";
	}
}
