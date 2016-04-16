<?php 

	# Подключение ядра

	require_once "core/controller.php";
	require_once "core/router.php";
	require_once "core/model.php";
	require_once "core/view.php";

	/*
	function coreAutoloader($class)
	{
		require_once 'core/' . $class . '.php';
	}
	spl_autoload_register('coreAutoloader');
	*/

	# Запуск маршрутизатора запросов
	Router::start();

