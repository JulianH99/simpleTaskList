<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task List</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./resources/css/main.css">
</head>
<body>
	<div class="user-name">
		<ul id="user-name">
			<li id="toggle-user-options">TaskList/Julián &#x25bc;
				<ul id="user-options">
					<li id="erase-all">Borrar todas las tareas</li>
					<li id="logout">Salir</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="tasklist">
		<div class="tasklist-header">
			<div class="tasklist-name">
				<span id="tasklist-name">Lista de tareas</span>
				<span id="tasklist-name-edit">&#x270f;</span>
			</div>
			<div class="tasklist-add">
				<form class="tasklist-add-form">
					<div class="form-group">
						<input type="text" id="task-title" placeholder="Agrega un título" class="form-input">
						<small>(opcional)</small>
					</div>
					<div class="form-group">
						<input type="text" id="task-message" placeholder="Escribe tu tarea e.d. Prepara la cena" class="form-input">
						<a class="button" id="task-add">&#x271a;</a>
					</div>
				</form>
			</div>
		</div>
		<div class="tasklist-body">
			<div class="task done">
				<div class="task-header">
					<div class="task-title">
						<span>Cena</span>
					</div>
					<div class="task-info">
						<span><script>document.write(new Date().toDateString());</script></span>
						<span>Agregado por: Julián</span>
					</div>
				</div>
				<div class="task-body">
					<span>Preparar la cena</span>
				</div>
				<div class="task-footer">
					<a class="button" id="erase">&#x2718;</a>
					<a class="button" id="mark-as-done"><label for="done">Hecho</label> <input type="checkbox" id="done"></a>
				</div>
			</div>
			<div class="task">
				<div class="task-header">
					<div class="task-title">
						<span>Cena</span>
					</div>
					<div class="task-info">
						<span><script>document.write(new Date().toDateString());</script></span>
						<span>Agregado por: Julián</span>
					</div>
				</div>
				<div class="task-body">
					<span>Preparar la cena</span>
				</div>
				<div class="task-footer">
					<a class="button" id="erase">&#x2718;</a>
					<a class="button" id="mark-as-done">Hecho <input type="checkbox" id="done"></a>
				</div>
			</div>
		</div>
	</div>
	<?php include 'views/modules/scripts.php' ?>
	<script type="text/javascript">
		$('#toggle-user-options').on('click', () => {
			$('#user-options').slideToggle();
		});
	</script>
</body>
</html>