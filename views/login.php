<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
		<form action="" class="form wp-40">
			<div class="form-group">
				<input type="text" id="user" class="w-100 form-input">
				<label for="user" class="w-100">Usuario</label>
			</div>
			<div class="form-group">
				<input type="password" id="pass" class="w-100 form-input">
				<label for="pass" class="w-100">Clave</label>
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
				<form action="" class="modal-form wp-40">
					<div class="form-group">
						<input type="text" id="r_user" class="w-100 form-input">
						<label for="r_user" class="w-100">Usuario</label>
					</div>
					<div class="form-group">
						<input type="text" id="r_pass" class="w-100 form-input">
						<label for="r_pass" class="w-100">Clave</label>
					</div>
					<div class="form-group">
						<a  class="button bg-1" id="regbutton">Aceptar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include('views/modules/scripts.php') ?>
</body>
</html>