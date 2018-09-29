<?php 
	class TodolistsController {
		public function index() {
			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$data = $model -> all();

			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View('todolists');
			$this -> view -> render('all', $data); 
		}

		public function create() {
			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$model -> create();

			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View();
			$this -> view -> redirect();
		}

		public function drop() {
			$id = $_POST['id'];

			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$model -> drop($id);
			
			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View();
			$this -> view -> redirect();
		}

		public function change($id, $name) {
			$id = $_POST['id'];
			$name = $_POST['title'];
			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$model -> change($id, $name);
			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View();
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
			

		}
	}