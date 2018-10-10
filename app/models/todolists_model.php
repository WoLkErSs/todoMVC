<?php
	class TodolistsModel extends Model {
		const DEFAULT_TODOLIST_NAME = 'New Todo List';
		public function create() {
			$const = self::DEFAULT_TODOLIST_NAME;
			$query = "INSERT INTO to_do_lists (name) VALUES('$const');";
			$this -> connect -> query($query);
		}
		private function have_tasks($todo_id) {
			$query = "SELECT * FROM tasks WHERE todo_id='$todo_id' ORDER BY priority;";
			$result = $this -> connect -> query($query);
			$tasks_array = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($tasks_array, $row);
			}
			return $tasks_array;		
		}
		
		public function all() {
			$user_id = $_SESSION['user_id'];
			$query = "SELECT * FROM to_do_lists WHERE user_id=$user_id;";
			$result = $this -> connect -> query($query);
			$todolists = [];
			$todolists_with_tasks = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($todolists, $row);
			}
			foreach ($todolists as $todolist) {
				$todolist['tasks'] = $this -> have_tasks($todolist['id']);
				array_push($todolists_with_tasks, $todolist);
			}
			return $todolists_with_tasks;		
		}
		public function drop($id) {
			$query = "DELETE FROM to_do_lists WHERE id='$id';";
			$this -> connect -> query($query);
		}
		public function update($id, $title) {
			$query = "UPDATE `to_do_lists` SET name='$title' WHERE id=$id;";
			$this -> connect -> query($query);
		}
	}



