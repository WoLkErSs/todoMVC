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

		public function change_status($id, $status) {
			if ($status == 'on') {
				$query = "UPDATE tasks SET status = true WHERE id = '$id';";
				$this -> connect -> query($query);
			}else {
				$query = "UPDATE tasks SET status = false WHERE id = '$id';";
				$this -> connect -> query($query);
			}
		}
		
		public function task_update($id, $name) {
				$query = "UPDATE tasks SET task = '$name' WHERE id = '$id';";
				$this -> connect -> query($query);
		}
	}