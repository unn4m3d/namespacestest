<?php 
	
	class View 
	{

		# Вывод готового html контента
		public function generate( $template, $content, $data )
		{

			include 'app/views/' . $template;

		}

		public function json( $array )
		{
			exit( json_encode( $data ) );
		}

	}