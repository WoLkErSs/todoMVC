<?php 
	$mysqli = new mysqli('localhost','root','','to_do_list');
	$login = $_POST['login'];
	$password = $_POST['password'];
	$query = "INSERT INTO `users`(login,password) VALUES('$login','$password');";
	$result = $mysqli -> query($query);

	if ($result) {
		session_start();
		$_SESSION['is_logined'] = 1;
	}
	header('location: http://todolist.ruby/');

 ?>
 <?php 
 /*
	$mysqli = new mysqli('localhost','root','','to_do_list');
		$password = $_POST['password'];
		$login = $_POST['login'];
	if ($_POST['password_2']) {
		$pass_2 = $_POST['password_2'];
		$email = $_POST['email'];
		if ($password == $pass_2) {
			$query = "INSERT INTO `users`(login,password,email) VALUES('$login','$password','$email');";
		}
	}else {
		$query = "SELECT * FROM `users` WHERE name=$login AND password=$password;";
	}
		$result = $mysqli -> query($query);

	if ($result) {
		session_start();
		$_SESSION['is_logined'] = 1;
	}
	header('location: http://todolist.ruby/');
*/
 ?>