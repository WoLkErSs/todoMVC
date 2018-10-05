<?php
	class TasksController extends Controller {
		
		private function tasks_model() {
			include_once ROOT_PATH . 'app/models/tasks_model.php';
			return new TasksModel;
		}

		public function new() {
			$task = $_POST['new_task_name'];
			$id = $_POST['id'];
			$this -> tasks_model() -> new($task, $id);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function drop() {
			$this -> tasks_model() -> drop($_POST['id']);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}
	}