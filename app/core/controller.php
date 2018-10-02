<?php 
	class Controller {

		public $view;
		function __construct($contr_class) {
			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View($contr_class);
		}
	}	
 ?>