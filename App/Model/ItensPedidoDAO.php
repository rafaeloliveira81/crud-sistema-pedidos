<?php

namespace App\Model;

class ItensPedidoDAO
{
	public function getAllItensPedido($idPedido)
	{
		$query = 'SELECT * FROM Itens_Pedido WHERE cod_pedido=:idPedido';
		$readAll = Conexao::getConexao()->prepare($query);

		$readAll->bindParam('idPedido', $idPedido, \PDO::PARAM_INT);

		$readAll->execute();

		if(!$readAll->rowCount() > 0)
		{
			return 'Sem Registros';
		}
		$result = $readAll->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getItemPedidoId($id)
	{
		$query = 'SELECT * FROM Itens_Pedido WHERE codigo:id';
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

	public function addItemPedido(ItensPedido $item)
	{
		$query = 'INSERT INTO Itens_Pedido (cod_pedido, cod_produto, unitario, quantidade, total) VALUES(:idPedido, :idProduto, :unitario, :quantidade, :total)';
		$insert = Conexao::getConexao()->prepare($query);

		$insert->bindValue('idPedido', $item->getPedidoId());
		$insert->bindValue('idProduto', $item->getProdutoId());
		$insert->bindValue('unitario', $item->getUnitario());
		$insert->bindValue('quantidade', $item->getQuantidade());
		$insert->bindValue('total', ($item->getQuantidade() * $item->getUnitario()));

		$insert->execute();
	}

	public function updateItemPedido(ItensPedido $item)
	{
		$query = 'UPDATE Itens_Pedido cod_pedido=:idPedido, cod_produto=:idProduto, unitario=:unitario, quantidade=:quantidade, total=:total WHERE codigo=:id';
		$update = Conexao::getConexao()->prepare($query);

		$update->bindValue('idPedido', $item->getPedidoId());
		$update->bindValue('idProduto', $item->getProdutoId());
		$update->bindValue('unitario', $item->getUnitario());
		$update->bindValue('quantidade', $item->getQuantidade());
		$update->bindValue('total', ($item->getQuantidade() * $item->getUnitario()));

		$update->execute();
	}

	public function delItemPedido($id)
	{
		$query = 'DELETE FROM Itens_Pedido WHERE codigo=:id';
		$delete = Conexao::getConexao()->prepare($query);
		$delete->bindParam('id', $id, \PDO::PARAM_INT);

		$delete->execute();
	}
}
