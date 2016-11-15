<!DOCTYPE html>
<html lang="en">
<head>
	<?php require('views/modules/header.php'); ?>
</head>
<body class="login">
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
				<label for="user" class="w-30">Usuario</label>
				<input type="text" id="user" class="w-70 form-input">

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
						<input type="password" id="r_pass" class="w-70 form-input">
						
					</div>
					<div class="form-group w-100">
						<a  class="button bg-1" id="regbutton">Aceptar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="message-container">
		<div class="message">
			<div class="message-title">
				<span>hola</span>
			</div>
			<div class="message-body">
				<span></span>
			</div>
		</div>
	</div>
	<?php include('views/modules/scripts.php') ?>
	<script type="text/javascript">
		
		var modal = $('.modal-background');

		$('#regshow').on('click', () => {
			var imgtop = $('.img').offset().top;
			var imgh = $('.img').outerHeight();

			modal.css('top', (imgtop + imgh) + 'px');
			//modal.addClass('modal-show');
		});

		$('.close').on('click', () => {
			modal.css('top', 100 + '%');
			$('#r_user').val('');
			$('#r_pass').val('');
			//modal.removeClass('modal-show');
		});
	</script>

</body>
</html>