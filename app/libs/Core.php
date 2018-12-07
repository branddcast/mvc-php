<?php

	//Extraer url ingresada en navegador

	class Core{
		protected $controllerActual = 'HomeController';
		protected $metodoActual = 'index';
		protected $parametros = [];

		public function __construct(){
			$url = $this->getUrl();

			//Buscar si el controlador existe
			if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
				//Si existe se se pone el controlador por defecto
				$this->controllerActual = ucwords($url[0]); 


				unset($url[0]);
			}

			//Llamamos al controlador 
			require_once '../app/controllers/'.$this->controllerActual.'.php';

			$this->controllerActual = new $this->controllerActual;

			//Revisar que haya un método en la url
			if(isset($url[1])){
				if (method_exists($this->controllerActual, $url[1])) {
					$this->metodoActual = $url[1];

					unset($url[1]);
				}
			}

			$this->parametros = $url ? array_values($url) : [];

			//Callback
			call_user_func_array([$this->controllerActual, $this->metodoActual], $this->parametros);
		}

		public function getUrl(){
			if (isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);

				return $url;
			}
		}
	}