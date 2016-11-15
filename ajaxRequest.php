<?php
	include 'core/core.php';

	$ctrl = $_GET['controller'];

	if(file_exists("core/ajax/$ctrl.ajax.php")){

		require('core/ajax/'.$ctrl.'.ajax.php');
	}
	else{
		require('views/error.php');
	}