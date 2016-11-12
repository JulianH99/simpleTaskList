<?php 

require_once './core/core.php';

session_start();

if(isset($_GET['view'])){
	$url = $_GET['view'];
	if(file_exists('core/controllers/'.$url.'.controller.php') && file_exists('views/'.$url.'.php')){


		include('core/controllers/'.$url.'.controller.php');
		include('views/'.$url.'.php');
	}else{
		include('./views/error.php');
	}
}
else{
	include('core/controllers/login.controller.php');
	include('views/login.php');
}
