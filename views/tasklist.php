
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
			<li id="toggle-user-options">TaskList/<?php echo $user ?> &#x25bc;
				<ul id="user-options">
					<li id="erase-all">Borrar todas las tareas</li>
					<li id="logout">Salir</li>
				</ul>
			</li>
		</ul>
	</div>
	<?php 

	?>
	<div class="tasklist">
		<div class="tasklist-header">
			<div class="tasklist-name">
				<span id="tasklist-name">
				<?php echo $list->getName(); ?></span>
				<span id="tasklist-name-edit">&#x270f;</span>
			</div>
			<div class="tasklist-add">
				<form class="tasklist-add-form">
					<div class="form-group">
						<input type="text" id="task-message" placeholder="Escribe tu tarea" class="form-input">
						<a class="button" id="task-add">&#x271a;</a>
					</div>
				</form>
			</div>
		</div>
		<div class="tasklist-body">
			<?php foreach ($tasks as $task) {
				echo Task::MakeTask($task);
			} ?>
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
	<?php include 'views/modules/scripts.php' ?>
	<script type="text/javascript">
		$('#toggle-user-options').on('click', () => {
			$('#user-options').slideToggle();
		});

		$(window).on('keypress', function(e){
			if(e.keyCode == 13){
				e.preventDefault();
				AddNewTask();
			}
		});
		$('#task-add').on('click', () => {
			AddNewTask();
		});
	</script>
</body>
</html>