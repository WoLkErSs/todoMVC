<?php 
	session_start();
	class TodolistsController extends Controller {

		private function todolist_model() {
			include_once ROOT_PATH . 'app/models/todolists_model.php';
			return new TodolistsModel;
		}

		public function index() {
			if($_SESSION['is_logined'] == 0) {
				$this -> view -> render('sign_in'); 
			}else {
				$data = $this -> todolist_model() -> all();
				$this -> view -> render('all', ['todolists' => $data]); 
			}
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

		public function sign_in() {
			$password = $_POST['password'];
			$login = $_POST['login'];
			$data = $this -> todolist_model() -> login($login, $password);
			if ($data) {
				$_SESSION['is_logined'] = 1;
			}
				$this -> view -> redirect('http://todolist.ruby/');
		}

		public function registration() {
			$password = $_POST['password'];
			$login = $_POST['login'];
			$pass_2 = $_POST['password_2'];
			$email = $_POST['email'];
		}
	}