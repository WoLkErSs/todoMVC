<?php
	class TodolistsModel extends Model {
		const DEFAULT_TODOLIST_NAME = 'New Todo List';

		public function create() {
			$const = self::DEFAULT_TODOLIST_NAME;
			$query = "INSERT INTO to_do_lists (name) VALUES('$const');";
			$this -> connect -> query($query);
		}

		private function have_tasks($todo_id) {
			$query = "SELECT * FROM tasks WHERE todo_id='$todo_id' ORDER BY priority;";
			$result = $this -> connect -> query($query);

			$tasks_array = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($tasks_array, $row);
			}
			return $tasks_array;		
		}
		
		public function all() {
			$query = "SELECT * FROM to_do_lists;";
			$result = $this -> connect -> query($query);
			$todolists = [];
			$todolists_with_tasks = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($todolists, $row);
			}
			foreach ($todolists as $todolist) {
				$todolist['tasks'] = $this -> have_tasks($todolist['id']);
				array_push($todolists_with_tasks, $todolist);
			}
			return $todolists_with_tasks;		
		}

		public function drop($id) {
			$query = "DELETE FROM to_do_lists WHERE id='$id';";
			$this -> connect -> query($query);
		}

		public function update($id, $title) {
			$query = "UPDATE `to_do_lists` SET name='$title' WHERE id=$id;";
			$this -> connect -> query($query);
		}
/*
		public function sign_in($login, $password) {
			$query = "SELECT EXISTS (SELECT * FROM `users` WHERE login='$login' AND password='$password');";
			$data = $this -> connect -> query($query);
			return $data;
		}

		public function sign_up($password, $login, $email) {
			$query = "SELECT * FROM users;";
			$result = $this -> connect -> query($query);
			$users = [];
			$user_data = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($users, $row);
			}
			if (true) {
				foreach ($users as $user) {
					$user_password = $user['password'];
					$user_login = $user['login'];
					$user_email = $user['email'];
					array_push($user_data, $user);
					if($user_password == $password || $user_login == $login || $user_email == $email) {
						$answer = 'Memeber already exists.';
					}
				}
			}else {
				$query = "INSERT INTO `users` VALUES(null, '$login', '$password', '$email');";
				$this -> connect -> query($query);
				$answer = 'Your registration successful done';
			}
			return $answer;
		}
*/
	}


