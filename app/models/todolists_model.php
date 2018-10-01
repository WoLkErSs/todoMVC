<?php
	class TodolistsModel {
		private $connect;

		public function __construct() {
				$this -> connect = new mysqli('localhost','root','','to_do_list');
			}

		public function create() {
			$query = "INSERT INTO to_do_lists (name) VALUES('DEFAULT_TODOLIST_NAME');";
			$this -> connect -> query($query);
		}
		
		public function all() {
			$query = "SELECT * FROM to_do_lists;";
			$result = $this -> connect -> query($query);
			$final_array = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($final_array, $row);
			}
			return $final_array;		
		}

		public function drop($id) {
			$query = "DELETE FROM to_do_lists WHERE id = '$id';";
			$this -> connect -> query($query);
		}

		public function update($id, $title) {
			$query = "UPDATE `to_do_lists` SET name = '$title' WHERE id = $id;";
			$this -> connect -> query($query);
		}	
	}


