<?php 
	class View {
		private $entity;
		const DEFAULT_LAYOUT_NAME = 'main';
		public function __construct($entity = '') {
			$this -> entity = $entity;
		}

		public function render($file_name, $data = [], $layout = self::DEFAULT_LAYOUT_NAME) {
			$entity = $this -> entity;
			include  ROOT_PATH . "app/views/layouts/$layout.php";
		}

		public function redirect($url) {
			header("Location: $url");
		}
	}
 ?>