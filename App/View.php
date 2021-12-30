<?php

namespace App;

class View
{
	private static function getContentView($view)
	{
		$file = __DIR__ . '/../Views/' .$view.'.html';
		return file_exists($file) ? file_get_contents($file) : 'Erro';
	}

	public static function getHeader() 
	{
		$file = __DIR__.'/../Views/header.html';
		return file_exists($file) ? file_get_contents($file) : "Erro no Header";
	}

	public static function render($view, $vars = []) 
	{
		$contentView = self::getContentView($view);

		$keys = array_keys($vars);
		$keys = array_map(function($item)
		{
			return '{{'.$item.'}}';
		}, $keys);
		return str_replace($keys, array_values($vars), $contentView);
	}
}
