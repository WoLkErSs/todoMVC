<?php 
	class Model {
		protected $connect;
		public function __construct() {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
			}
	}
 ?>