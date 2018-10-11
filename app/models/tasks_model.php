<?php
	class TasksModel extends Model {
		public function new($new_task_name, $id) {
			$result = $this -> max_priority($id);
			$max = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($max, $row);
			}
			$priority = ($max[0]['max']+1);
			$query = "INSERT INTO tasks (task, status, todo_id, priority) VALUES('$new_task_name', 0, $id, $priority);";
			$this -> connect -> query($query);
		}

		public function drop($id) {
			$query = "DELETE FROM tasks WHERE id = '$id';";
			$this -> connect -> query($query);
		}

		public function change_status($id, $status) {
			if ($new_status = $status == 'on' ? 'true' : 'false') {
				$query = "UPDATE tasks SET status = $new_status WHERE id = '$id';";
				$this -> connect -> query($query);
			}
		}
		
		public function update($id, $name) {
				$query = "UPDATE tasks SET task = '$name' WHERE id = '$id';";
				$this -> connect -> query($query);
		}

		public function moveUp($id, $prior) {
			$query = "UPDATE tasks SET priority=if(priority=$prior,$prior-1,$prior) WHERE priority IN ($prior, $prior-1)" ;
			$this -> connect -> query($query);
		}

		public function moveDown($id, $prior) {
			$query = "update tasks set priority=if(priority=$prior,$prior+1,$prior) where priority in ($prior, $prior+1);";
			$this -> connect -> query($query);

		}

		private function max_priority($id) {
			$query = "SELECT MAX(priority) as `max` FROM tasks WHERE todo_id=$id;";
			$result = $this -> connect -> query($query);
			return $result;
		}
	}