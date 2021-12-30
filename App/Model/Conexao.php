<?php

namespace App\Model;

class Conexao
{
	private static $instance;

	public function getConexao() {
		if (!isset(self::$instance)) {
			try
			{
				self::$instance = new \PDO("mysql:host=172.16.238.12;port=3306;dbname=coletek", 
					"root", 
					"secret" 
				);
			}
			catch (\PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}
}
