<?php 
	session_start();
	class UsersController extends Controller {
		
		private function users_model() {
			include_once ROOT_PATH . 'app/models/users_model.php';
			return new UsersModel;
		}

		public function index() {
			$this -> view -> render('sign_in');
		}

		public function sign_in() {
			$password = $_POST['password'];
			$login = $_POST['login'];
			$data = $this -> users_model() -> sign_in($login, $password);

			if ($data) {
				$_SESSION['is_logined'] = 1;
			}
			$this -> view -> redirect('http://todolist.ruby/');
		}

		public function sign_out() {
			$_SESSION['is_logined'] = 0;
			$this -> view -> redirect('http://todolist.ruby/');
		}

		public function sign_up() {
			$login = $_POST['login'];
			$password = $_POST['password_1'];
			$pass_confirm = $_POST['password_2'];
			$email = $_POST['email'];
			$check_email = strpos("$email",'@');

			if ($password == $pass_confirm && $check_email) {
				$this -> users_model() -> sign_up($password, $login, $email);
			}
			$this -> view -> redirect('http://todolist.ruby/');
		}

	}