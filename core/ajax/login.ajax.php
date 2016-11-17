<?php 
session_start();
if (isset($_GET['add']) && $_POST) {
		
		$result = array();
		$curuser = $_POST['user'];
		$curpass = $_POST['pass'];

		if(!empty($curuser) && !empty($curpass)){
			 $user = new User($curuser,$curpass);

			 if(!$user->Exists()){
			 	if($user->Create() != -1){
			 		$tsklist = new TaskList($user->GetID(), TaskList::$defaultName);
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
		unset($user, $tsklist);
		echo json_encode($result);
	}
if (isset($_GET['login']) && $_POST) {
		$result = array();
		$curuser = $_POST['user'];
		$curpass = $_POST['pass'];

		if(!empty($curuser) && !empty($curpass)){

			$user = new User($curuser,$curpass);

			if($user->Exists()){
				$login = $user->Login();
				if($login !=  -1 && $login != 0){
					$_SESSION['user_id'] = $user->GetID();
					$_SESSION['user_name'] = $user->GetName();
					$result = array(
						'title' => 'Bienvenido',
						'body' => 'En seguida verás tu lista de tareas',
						'class' => 'info',
						'ahead' => true
						);
				}
				else{
			 		$result = array(
			 			'title' => '¡Oh no!',
			 			'body' => 'Los datos que ingresaste no son correctos',
			 			'class' => 'error'
			 			);
				}

			}else{
				$result = array(
					'title' =>'¡Hey!',
					'body'=>'Este usuario no está registrado aún',
					'class' =>'error'
					);
			}
		}
		header('content-type: application/json');
		echo json_encode($result);
	}	