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
		
		public function update($id, $name) {
				$query = "UPDATE tasks SET task = '$name' WHERE id = '$id';";
				$this -> connect -> query($query);
		}

		public function moveUp($id, $prior) {
			if ($prior == 0) {
				$query = "UPDATE tasks SET priority=$id WHERE id=$id;";
			}else {
				$query = "UPDATE tasks SET priority=if(priority=$prior,$prior-1,$prior) WHERE priority IN ($prior, $prior-1)" ;
			}
				$this -> connect -> query($query);
		}

		public function moveDown($id, $prior) {
			if ($prior == 0) {
				$query = "UPDATE tasks SET priority=$id WHERE id=$id;";

			}else {
				$query = "update tasks set priority=if(priority=$prior,$prior+1,$prior) where priority in ($prior, $prior+1);";
			}
			$this -> connect -> query($query);

		}
	}