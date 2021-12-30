<?php

namespace App\Model;

class Cliente
{
	private $codigo;
	private $nome;
	private $cpf;

	public function getId()
	{
		return $this->codigo;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}
}
