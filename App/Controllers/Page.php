<?php

namespace App\Controllers;

use App\View;
define('URL', 'http://'.$_SERVER['HTTP_HOST']);

class Page 
{
	public static function getHeader() {
		return View::render('header');
	}

	public static function getFooter()
	{
		return View::render('footer');
	}
	public static function getPage($title, $content)
	{
		return View::render('page', [
			'URL' => URL,
			'title' => $title,
			'header' => self::getHeader(),
			'content' => $content,
			'footer' => self::getFooter()
		]);

	}
}
