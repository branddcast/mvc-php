<?php

	require_once '../app/config/config.php';

	//Carga todas las clases que se encuentran en libreria
	spl_autoload_register(function($class){
		require_once 'libs/'.$class.'.php';
	});

	