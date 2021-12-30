<?php 

namespace App\Controllers;

use App\View;

class HomeController extends Page
{
	public static function getHome()
	{
		$content =  View::render('home', [
			'name' => 'Rafael',
			'description' => 'Descrição de alguma coisa'
		]);

		return parent::getPage('Sistema de Pedidos', $content);
	}
}
