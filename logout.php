<?php 
	session_start();
	if ($_SESSION['is_logined'] == 1) {
		$_SESSION['is_logined'] =0;
	}
	header('location: http://todolist.ruby/');
 ?>