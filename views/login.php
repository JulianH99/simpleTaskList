<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo APP_NAME ?></title>
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>
	<header>
		<div class="header-content">
			<span>Simple TaskList &#9776;</span>
		</div>
	</header>
	<div class="container">
		<form action="" class="form login-form wp-40">
			<div class="form-group img">
				<img class="form-img" 
				src="resources/img/icon.png">
			</div>
			<div class="form-group w-100">
				<label for="user" class="w-30">Usuario</label>				<input type="text" id="user" class="w-70 form-input">

			</div>
			<div class="form-group">
				<label for="pass" class="w-30">Clave</label>
				<input type="password" id="pass" class="w-70 form-input">
				
			</div>
			<div class="form-group buttons">
				<a class="button bg-2" id="regshow">Registrarse</a>
				<a class="button bg-1" accesskey="enter" id="logbutton" >Entrar</a>
			</div>
		</form>
	</div>
	<div class="modal-background w-10">
		<div class="modal wp-40">
			<div class="modal-header">
				<span class="close">&#x274C;</span>
			</div>
			<div class="modal-content">
				<form action="" class="modal-form form wp-40">
					<div class="form-group w-100">
						<label for="r_user" class="w-30">Usuario</label>
						<input type="text" id="r_user" class="w-70 form-input">
						
					</div>
					<div class="form-group w-100">
						<label for="r_pass" class="w-30">Clave</label>
						<input type="text" id="r_pass" class="w-70 form-input">
						
					</div>
					<div class="form-group w-100">
						<a  class="button bg-1" id="regbutton">Aceptar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="message-container">
		<div class="message info">
			<div class="message-title">
				<span>Bienvenido</span>
			</div>
			<div class="message-body">
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span>
			</div>
		</div>
	</div>
	<?php include('views/modules/scripts.php') ?>
</body>
</html>