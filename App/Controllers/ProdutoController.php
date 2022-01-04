<?php

namespace App\Controllers;

use App\Model\Produto;
use App\Model\ProdutoDAO;
use App\View;

class ProdutoController extends Page
{
	private static function getProdutos()
	{
		$itens = '';
		$produtoDao = new ProdutoDAO;
		$result = $produtoDao->getAllProdutos();

		foreach($result as $key => $value) {
			$itens .= View::render('itens_produto', [
				'id'	 => $value['codigo'],
				'descricao' => $value['descricao'],
				'preco'	 => $value['preco'],
				'unidade'	 => $value['unidade'],
			]);
		}
		return $itens;
	}

	private function getProdutoId($id)
	{
		$produtoDao = new ProdutoDAO;
		$result = $produtoDao->getProdutoId($id);
		return $result;
	}

	public static function listProduto()
	{
		$content = View::render('produtos', [
			'itens' => self::getProdutos()
		]);
		return Page::getPage('Sistema de Pedidos :: Clientes', $content);
	}

	public function getProduto() 
	{
		$content = View::render('cadastro_produto');
		return Page::getPage('Produto', $content);
	}

	public function editProduto($id) 
	{
		$produto = $this->getProdutoId($id);
		$content = View::render('editar_produto', [
			'id' => $produto['codigo'],
		  'descricao' => $produto['descricao'],
			'preco' => $produto['preco'],
		  'unidade' => $produto['unidade']	
		]);
		return Page::getPage('Produto', $content);
	}
	
	public function addProduto($data) 
	{
		$produto = new Produto;
		$produto->setDescricao($data['descricao']);
		$produto->setPreco($data['preco']);
		$produto->setUnidade($data['unidade']);

		$produtoDao = new ProdutoDAO;
		$produtoDao->addProduto($produto);

		return "
			<script>
				alert('Cadastrado com sucesso')
				window.location.href='http://localhost:3000/produtos'
			</script>";
	}

	public function updateProduto($data)
	{
		$produto = new Produto;
		$produto->setId((int)$data['codigo']);
		$produto->setDescricao($data['descricao']);
		$produto->setPreco($data['preco']);
		$produto->setUnidade($data['unidade']);
		$produtoDao = new ProdutoDAO;
		$produtoDao->updateProduto($produto);

		return "
			<script>
				alert('Editado com sucesso')
				window.location.href='http://localhost:3000/produtos'
			</script>";
	}

	public function getDelProduto($id)
	{
		$produto = $this->getProdutoId((int)$id);
		$content = View::render('deletar-produto', [
			'codigo' => $produto['codigo'],
			'descricao' => $produto['descricao'],
			'preco' => $produto['preco'],
			'unidade' => $produto['unidade']
		]);
		return Page::getPage('Sistema de Pedidos :: Produtos > Deletar', $content);
	}

	public function delProduto($data)
	{
		$produtoDao = new ProdutoDAO;
		$produtoDao->delProduto($data['codigo']);

		return "
			<script>
				alert('Excluido com sucesso')
				window.location.href='http://localhost:3000/produtos'
			</script>";
	}
}
