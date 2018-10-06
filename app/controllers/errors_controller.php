<?php 
	
	class ErrorsController {
		
		public function error404() {
			echo 'Error 404 file does not exists';
		}

		public function error405() {
			echo 'Error 405 method does not exists'.'<br>';
		}
	}
 ?>