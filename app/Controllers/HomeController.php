<?php
namespace App\Controllers;

class HomeController extends CustomBaseController
{

	public function index()
	{
		return $this->view('home');
	}

	// TODO
	// Another page

}
