<?php
	class TasksController extends Controller {
		
		private function tasks_model() {
			include_once ROOT_PATH . 'app/models/tasks_model.php';
			return new TasksModel;
		}

		public function new() {
			$task = $_POST['new_task_name'];
			$id = $_POST['id'];
			if ($task) {
				$this -> tasks_model() -> new($task, $id);
			}
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function drop() {
			$this -> tasks_model() -> drop($_POST['id']);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function change_status() {
			$id = $_POST['task_id'];
			$status = $_POST['status'];
			$this -> tasks_model() -> change_status($id, $status);
			$this -> view -> redirect('http://todolist.ruby/');
		}

		public function update() {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$this -> tasks_model() -> update($id, $name);
			$this -> view -> redirect('http://todolist.ruby/');
		}

		public function moveUp() {
			$priority = $_POST['priority'];
			$id = $_POST['id'];
			$this -> tasks_model() -> moveUp($id, $priority);
			$this -> view -> redirect('http://todolist.ruby/');
		}

		public function moveDown() {
			$id = $_POST['id'];
			$priority = $_POST['priority'];
			$this -> tasks_model() -> moveDown($id, $priority);
			$this -> view -> redirect('http://todolist.ruby/');
		}
	}