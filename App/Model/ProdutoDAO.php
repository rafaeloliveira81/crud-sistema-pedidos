<?php 

namespace App\Model;

use App\Model\Produto;

class ProdutoDAO
{
	public function addProduto(Produto $produto)
	{
		$query = "INSERT INTO Produtos (descricao, preco, unidade) VALUES (:descricao, :preco, :unidade)";
		$insert = Conexao::getConexao()->prepare($query);
		$insert->bindValue('descricao', $produto->getDescricao());
		$insert->bindValue('preco', $produto->getPreco());
		$insert->bindValue('unidade', $produto->getUnidade());

		$insert->execute();
	}

	public function getAllProdutos()
	{
		$query = 'SELECT * FROM Produtos';

		$read = Conexao::getConexao()->prepare($query);
		$read->execute();

		if(!$read->rowCount() > 0)
		{
			echo 'Sem registros' . PHP_EOL;
		}
			$result = $read->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
	}

	public function getProdutoId($id)
	{
		$query = 'SELECT * FROM Produtos WHERE codigo=:id';
		$read = Conexao::getConexao()->prepare($query);
		
		$read->bindParam('id', $id, \PDO::PARAM_INT);
		$read->execute();

		if(!$read->rowCount() > 0)
		{
			echo 'Registro não encontrado' . PHP_EOL;
		}

		$result = $read->fetch(\PDO::FETCH_ASSOC);
		return $result;
	}

	public function updateProduto(Produto $produto)
	{
		$query = 'UPDATE Produtos 
			SET descricao=:descricao, preco=:preco, unidade=:unidade 
			WHERE codigo=:id';
		$update = Conexao::getConexao()->prepare($query);
		
		$update->bindValue('id', $produto->getId());
		$update->bindValue('descricao', $produto->getDescricao());
		$update->bindValue('preco', $produto->getPreco());
		$update->bindValue('unidade', $produto->getUnidade());

		$update->execute();
	}

	public function delProduto($id)
	{
		$query = 'DELETE FROM Produtos WHERE codigo=:id';
		$delete = Conexao::getConexao()->prepare($query);

		$delete->bindParam('id', $id, \PDO::PARAM_INT);

		$delete->execute();
	}
}
