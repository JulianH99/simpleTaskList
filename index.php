<?php 

require_once './core/core.php';

session_start();

if(isset($_GET['view'])){
	$url = $_GET['view'];
	if(file_exists($url.'controller.php')){

		include('./core/controllers/'.$url.'controller.php');
	}else{
		include('./views/error.html');
	}
}
else{
	include('./views/login.php');
}
