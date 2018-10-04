<?php 
	class TodolistsController extends Controller {

		private function todolist_model() {
			include_once ROOT_PATH . 'app/models/todolists_model.php';
			return new TodolistsModel;
		}

		public function index() {
			$data_tasks = $this -> todolist_model() -> have_tasks();
			$data = $this -> todolist_model() -> all();
			$this -> view -> render('all', $data, $data_tasks); 
		}

		public function create() {
			$this -> todolist_model() -> create();
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function drop() {
			$this -> todolist_model() -> drop($_POST['id']);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function update() {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$this -> todolist_model() -> update($id, $title);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function new_task() {
			$task = $_POST['new_task_name'];
			$id = $_POST['id'];
			$this -> todolist_model() -> new_task($task, $id);
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}
	}