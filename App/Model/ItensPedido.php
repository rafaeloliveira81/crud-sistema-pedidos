<?php 

namespace App\Model;

class ItensPedido
{
	private $id;
	private $cod_pedido;
	private $cod_produto;
	private $unitario;
	private $quantidade;
	private $total;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getPedidoId()
	{
		return $this->cod_pedido;
	}

	public function setPedidoId($pedidoId)
	{
		$this->cod_pedido = $pedidoId;
	}

	public function getProdutoId()
	{
		return $this->cod_produto;
	}

	public function setPrdutoId($produtoId)
	{
		$this->cod_produto = $produtoId;
	}

	public function getUnitario()
	{
		return $this->unitario;
	}

	public function setUnitario($unitario)
	{
		$this->unitario = $unitario;
	}

	public function getQuantidade()
	{
		return $this->quantidade;
	}

	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function setTotal($total)
	{
		$this->total = $total;
	}
}
