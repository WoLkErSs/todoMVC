<?php
	class TasksModel extends Model {
		

		public function new($new_task_name, $id) {
			$query = "INSERT INTO tasks (task, status, todo_id) VALUES('$new_task_name', 0, $id);";
			$this -> connect -> query($query);
		}

		public function drop($id) {
			$query = "DELETE FROM tasks WHERE id = '$id';";
			$this -> connect -> query($query);
		}
	
	}