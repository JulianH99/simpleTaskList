<?php
	include 'core/core.php';

	$ctrl = $_GET['controller'];

	if(file_exists("core/controllers/$ctrl.controller.php")){

		require('core/controllers/'.$ctrl.'.controller.php');
	}
	else{
		require('views/error.php');
	}