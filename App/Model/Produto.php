<?php 

namespace App\Model;

class Produto
{
	private $id;
	private $descricao;
	private $preco;
	private $unidade;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function getPreco()
	{
		return $this->preco;
	}
	
	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	public function getUnidade()
	{
		return $this->unidade;
	}

	public function setUnidade($unidade)
	{
		$this->unidade = $unidade;
	}

}
