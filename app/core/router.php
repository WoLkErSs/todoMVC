<?php 
	class Router {

		private $controller_name;
		private $action_name;
		private $request;
		private $controller;

		public function init() {

			$this -> request = $_SERVER['REQUEST_URI'];
			$this -> controller_name = explode('/', $this -> request)[1];
			$this -> action_name = explode('/', $this -> request)[2];

			if (!$this -> controller_name || !$this -> action_name) {
				include "app/controllers/errors_controller.php";
				$this -> controller_name = new ErrorsController;
				$this -> controller_name -> error404();
			}else {
				$controller_name = lcfirst($this -> controller_name).'_controller';
				if (file_exists("app/controllers/$controller_name.php")) {
					//var_dump("file exists");
					require "app/controllers/$controller_name.php";
					$this -> controller = ucfirst($this -> controller_name).'Controller';
					if (method_exists(new $this -> controller , "{$this -> action_name}")) {
						//var_dump('method_exists');
						$controller = new $this -> controller ;
						$action = $this -> action_name;
						$controller -> $action();
						//var_dump($this -> action_name);
					}else{
						var_dump("{$this -> action_name}");
						require "app/controllers/errors_controller.php";
						$error = new ErrorsController;
						$error -> error405();
						//var_dump('Error 406- method is not exist');
					}
				}else {
					require "app/controllers/errors_controller.php";
					$error = new ErrorsController;
					$error -> error404();
					//var_dump('Error 405 - file is not exist');
				}	
			}
		}
	}
 ?>