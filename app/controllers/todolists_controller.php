<?php 
	session_start();
	class TodolistsController extends Controller {
		public function index() {
			if($_SESSION['is_logined'] == 0) {
				$this -> view -> redirect('http://todolist.ruby/users/index');
			}else {
				$data = $this -> todolist_model() -> all($_SESSION['user_id']);
				$this -> view -> render('all', ['todolists' => $data]); 
			}
		}

		public function create() {
			$this -> todolist_model() -> create($_SESSION['user_id']);
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

		public function sign_out() {
			$_SESSION['is_logined'] = 0;
			$this -> view -> redirect('http://todolist.ruby/');
		}
		
		private function todolist_model() {
			include_once ROOT_PATH . 'app/models/todolists_model.php';
			return new TodolistsModel;
		}
	}