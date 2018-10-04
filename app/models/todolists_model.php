<?php
	class TodolistsModel {
		private $connect;
		const DEFAULT_TODOLIST_NAME = 'New Todo List';


		public function __construct() {
			$this -> connect = new mysqli('localhost','root','','to_do_list');
			}

		public function create() {
			$const = self::DEFAULT_TODOLIST_NAME;
			$query = "INSERT INTO to_do_lists (name) VALUES('$const');";
			$this -> connect -> query($query);
		}

		public function new_task($new_task_name, $id) {
			$query = "INSERT INTO tasks (task, status, todo_id) VALUES('$new_task_name','performend' , $id);";
			$this -> connect -> query($query);
		}

		public function have_tasks() {
			$query = "SELECT * FROM tasks;";
			$result = $this -> connect -> query($query);
			$tasks_array = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($tasks_array, $row);
			}
			return $tasks_array;		
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


