<?php 

	use \Model;

	class Error
	{

		public $model;
		public $view;

		public function __construct()
		{
			$this->model = new \Model\Error;
		}

		public function index()
		{

		}


	}