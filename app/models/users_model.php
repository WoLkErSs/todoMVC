<?php 
	
	class UsersModel extends Model {

		public function sign_in($login, $password) {

				$query = "SELECT * FROM `users` WHERE login='$login' AND password='$password';";
				$result = $this -> connect -> query($query);
				$clients = [];
				while ($row = mysqli_fetch_assoc($result)) {
					array_push($clients, $row);
				}
				foreach ($clients as $user) {
				}
				$user_id = $user['id'];
				return $user_id;
		}

		public function sign_up($password, $login, $email) {
			$query = "SELECT * FROM users;";
			$result = $this -> connect -> query($query);
			$users = [];
			$user_data = [];
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($users, $row);
			}
			foreach ($users as $user) {
				$user_password = $user['password'];
				$user_login = $user['login'];
				$user_email = $user['email'];
				array_push($user_data, $user);
			}
				if($user_password == $password || $user_login == $login || $user_email == $email) {
					$answer = 0;
				}else {
					$query = "INSERT INTO `users` VALUES(null, '$login', '$password', '$email');";
				}
			$this -> connect -> query($query);
			$user_id = $this -> sign_in( $login, $password);
			return $user_id;
		}
	}