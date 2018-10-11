<?php 
	session_start();
	class UsersController extends Controller {
		public function index() {
			if($_SESSION['is_logined'] == 0) {
				$this -> view -> render('sign_in'); 
			}else {
				$data = $this -> users_model() -> all();
				$this -> view -> render('all', ['users' => $data]); 
			}
		}

		public function sign_in() {
			$password = $_POST['password'];
			$login = $_POST['login'];
			$data = $this -> users_model() -> sign_in($login, $password);
			if ($data) {
				$_SESSION['is_logined'] = 1;
				$_SESSION['user_id'] = $data;
			}
			$this -> view -> redirect('/');
		}

		public function sign_out() {
			$_SESSION['is_logined'] = 0;
			$_SESSION['user_id'] = null;
			$this -> view -> redirect('/');
		}

		public function registration() {
			$this -> view -> render('sign_up');
		}

		public function sign_up() {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$pass_confirm = $_POST['pass_confirm'];
			$email = $_POST['email'];
			$check_email = strpos("$email",'@');
			$data = $this -> users_model() -> sign_up($password, $pass_confirm, $login, $email, $check_email);
			if ($data) {
				$_SESSION['is_logined'] = 1;
				$_SESSION['user_id'] = $data;
			}
			$this -> view -> redirect('/');
		}

		private function users_model() {
			include_once ROOT_PATH . 'app/models/users_model.php';
			return new UsersModel;
		}
	}