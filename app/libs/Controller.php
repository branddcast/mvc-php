<?php

	class Controller{
		//Cargar modelo

		public function model($model){
			require_once '../app/models/'.$model.'.php';

			//Instanciar modelo

			return new $model();
		}

		//Cargar vista

		public function view($view, $data = []){

			if (file_exists('../app/views/'.$view.'.php')) {
				require_once '../app/views/'.$view.'.php';
			}else{
				//si no existe die()

				die('La vista no existe');
			}
		}
	}