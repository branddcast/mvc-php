<?php

class HomeController extends Controller{

	public function __construct(){

	}

	public function index(){

		$datos = [
			'titulo' => 'Bienvenido a Portal MVC'
		];

		$this->view('pages/home', $datos);
	}
}