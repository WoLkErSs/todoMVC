<?php
	class TodolistsModel {
		private $connect;

		public function create() {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
			$query = "INSERT INTO to_do_lists (name) VALUES('New Todo list');";
			$this -> connect -> query($query);
		}
		
		public function all() {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
		$query = "SELECT * FROM to_do_lists;";
		$result = $this -> connect -> query($query);
		$final_array = [];
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($final_array, $row);
		}
		return $final_array;		
		}

		public function drop($id) {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
			$query = "DELETE FROM to_do_lists WHERE id = '$id';";
			$this -> connect -> query($query);
		}

		public function change($id, $name) {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
			$query = "UPDATE `to_do_list` SET name = $name WHERE id = $id;";
		}
				
	}


