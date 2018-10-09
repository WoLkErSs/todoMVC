<?php
 	//session_start();
	//if ($_SESSION['is_logined'] == 1) {
		include 'app/core/router.php';
		include 'constants.php';
		include 'app/configs/configs.php';
	$router = new Router();
	$router -> init();
	//}else {
	//	header('location: http://todolist.ruby/todolists/login');
	//}
	
 ?>
 
