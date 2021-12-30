<?php 

namespace App\Model;

class Pedido
{
	private $id;
	private $data;
	private $id_cliente;
	private $total;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function getIdCliente()
	{
		return $this->id_cliente;
	}

	public function setIdCliente($idCliente)
	{
		$this->id_cliente = $idCliente;
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
