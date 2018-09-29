<?php 
	include 'app/core/router.php';
	include 'constants.php';
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	function debug($str) {
		echo '<pre>';
		var_dump($srt);
		echo '</pre>';

	}

	$router = new Router();
	$router -> init();

	//require_once 'app/bootstrap.php';
	//include 'core/router.php';

 ?>
 