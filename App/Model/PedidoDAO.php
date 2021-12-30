<?php 

namespace App\Model;
use App\Model\Pedido;

class PedidoDAO
{
	public function getAllPedidos()
	{
		$query = 'SELECT * FROM Pedidos';
		$readAll = Conexao::getConexao()->prepare($query);
		$readAll->execute();

		if(!$readAll->rowCount() > 0)
		{
			return 'Sem Registros';
		}

		$result = $readAll->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}

	public function addPedido(Pedido $pedido)
	{
		$query = 'INSERT INTO Pedidos TO (data, cod_cliente, total) VALUES (:data, :idCliente, :total)';
		$insert = Conexao::getConexao()->prepare($query);

		$insert->bindValue('data', $pedido->getData());
		$insert->bindValue('idCliente', $pedido->getIdCliente());
		$insert->bindValue('total', $pedido->getTotal());

		$insert->execute();
	}

	public function getPedidoId($id)
	{
		$query = 'SELECT * FROM	Pedidos WHERE codigo=:id';
		$read = Conexao::getConexao()->prepare($query);

		$read->bindParam('id', $id, \PDO::PARAM_INT);
		$read->execute();

		if (!$read->rowCount() > 0)
		{
			return 'Registro não encotrado';
		}
		$result = $read->fetch(\PDO::FETCH_ASSOC);
		return $result;
	}

	public function updatePedido(Pedido $pedido)
	{
		$query = 'UPDATE Pedidos SET data=:data, cod_cliente=:idCliente, total=:total WHERE codigo=:id';
		$update = Conexao::getConexao()->prepare($query);

		$update->bindValue('data', $pedido->getData());
		$update->bindValue('idCliente', $pedido->getIdCliente());
		$update->bindValue('total', $pedido->getTotal());

		$update->execute();
	}

	public function delPedido($id)
	{
		$query = 'DELETE FROM Pedidos WHERE codigo=:id';
		$delete = Conexao::getConexao()->prepare($query);

		$delete->execute();
	}
}
