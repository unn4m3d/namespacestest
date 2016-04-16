<?php 

	class Router
	{

		public function start()
		{

			# Значения по умолчанию, используются если аргументы не переданы
			$controller = 'main';
			$action = 'index';

			/* 

				Получаем массив с аргументами, где:
				$args[1] - название контроллера
				$args[2] - название вызываемого действия

			*/
			$args = explode( "/", $_SERVER["REQUEST_URI"]);

			# Проверки на наличие аргументов
			if( !empty( $args[1] ) )
			{
				$controller = strtolower($args[1]);
			}

			if( !empty( $args[2] ) )
			{
				$action = strtolower($args[2]);
			}

			# Подключаем модель
			if( file_exists("app/models/$controller.php") )
			{
				echo "Подключили модель $controller<br>";
				include "app/models/$controller.php";
			}

			# Подключаем контроллер
			if ( file_exists( "app/controllers/$controller.php" ) ) 
			{
				echo "Подключили контроллер $controller<br>";
				include "app/controllers/$controller.php";
			}
			else
			{
				Router::pageNotFound();
			}

			$controller = "Controllers\\".$controller;
			$controller = new $controller;

			if( method_exists($controller, $action) )
			{
				echo "Вызываем $action<br>";
				$controller->$action();
			}
			else
			{
				Router::pageNotFound();
			}

		}

		public function pageNotFound()
		{

			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
	        header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:'.$host.'error');

		}

	}
