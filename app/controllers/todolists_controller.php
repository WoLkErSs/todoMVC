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
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function drop() {
			$id = $_POST['id'];

			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$model -> drop($id);
			
			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View();
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function update() {
			$id = $_POST['id'];
			$title = $_POST['title'];
			include ROOT_PATH . 'app/models/todolists_model.php';
			$model = new TodolistsModel;
			$model -> update($id, $title);
			include ROOT_PATH . 'app/core/view.php';
			$this -> view = new View();
			$this -> view -> redirect('http://todolist.ruby/todolists/index');
		}

		public function n_task() {
			$title = $_POST['title'];

			include ROOT_PATH . 'app/models/todolists_model.php';

		}
	}