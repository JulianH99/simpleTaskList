<?php

if (isset($_GET['add']) && $_POST) {
		
		$result = array();
		$curuser = $_POST['user'];
		$curpass = $_POST['pass'];

		if(!empty($curuser) && !empty($curpass)){
			 $user = new User($curuser,$curpass);

			 if(!$user->Exists()){
			 	if($user->Create() != -1){
			 		$tsklist = new TaskList($user->id, TaskList::$defaultName);
			 		if($tsklist->Create()!= -1){
			 			$result = array(
			 				'title' => 'Bienvenido',
			 				'body' => 'Tu cuenta ha sido creada :)',
			 				'class' => 'info');

			 		}
			 		else{
			 			$result = array(
			 				'title' => 'Lo sentimos',
			 				'body' => 'Ha ocurrido un error :(',
			 				'class' => 'error'
			 				);
			 		}
			 	}
			 	else{
			 		$result  = array(
			 			'title' => 'Error',
			 			'body' => 'Ha ocurrido un error al crear tu cuenta :(',
			 			'class' => 'error');
			 	}

			 }
			 else{
			 	$result = array(
			 		'title' => '¡Ups!',
			 		'body' => 'Al parecer este usuario ya se encuentra en uso',
			 		'class' =>'error');
			 }

		}
		header('content-type: application/json');
		echo json_encode($result);
	}
elseif (isset($_GET['login'])) {
		# code...
	}	
