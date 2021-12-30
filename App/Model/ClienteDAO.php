<?php

use App\Model\Cliente;
use App\Model\Conexao;

namespace App\Model;

class ClienteDAO
{
	public function addCliente(Cliente $cliente)
	{
		$query = 'INSERT INTO Clientes (nome, cpf) VALUES (:nome, :cpf)';
		$insert = Conexao::getConexao()->prepare($query);

		$insert->bindValue('nome', $cliente->getNome());
		$insert->bindValue('cpf', $cliente->getCpf());

		$insert->execute();
	}

	public function getAllClientes()
	{
		$query = 'SELECT * FROM Clientes';

		$read = Conexao::getConexao()->prepare($query);
		$read->execute();

		if(!$read->rowCount() > 0)
		{
			return 'Sem registros';
		}
			$result = $read->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
	}

	public function getClienteId($id)
	{
		$query = 'SELECT * FROM Clientes where codigo=:id';
		$read = Conexao::getConexao()->prepare($query);

		$read->bindParam('id', $id, \PDO::PARAM_INT);
		$read->execute();

		if(!$read->rowCount() > 0) 
		{
			return 'Registro não encontrado';
		}
			$result = $read->fetch(\PDO::FETCH_ASSOC);
			return $result;
	}

	public function updateCliente($id, $cliente)
	{
		$query = 'UPDATE Clientes SET nome=:nome, cpf=:cpf WHERE codigo=:id';
		$update = Conexao::getConexao()->prepare($query);

		$update->bindValue('id', $id);
		$update->bindValue('nome', $cliente->getNome());
		$update->bindValue('cpf', $cliente->getCpf());

		$update->execute();

	}

	public function delCliente($id)
	{
		$query = 'DELETE FROM Clientes WHERE codigo=:id';

		$delete = Conexao::getConexao()->prepare($query);

		$delete->bindParam('id', $id, \PDO::PARAM_INT);

		$delete->execute();
	}
}
