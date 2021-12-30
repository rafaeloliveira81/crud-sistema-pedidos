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
}
