<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'views/modules/header.php' ?>
</head>
<body>
	<div class="user-name">
		<ul id="user-name">
			<li id="toggle-user-options">TaskList/<?php echo $user ?> &#x25bc;
				<ul id="user-options">
					<li id="erase-all">Borrar todas las tareas</li>
					<li id="mark-all">Marcar todas como hechas</li>
					<li id="logout"><a href="views/logout.php">Salir</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<?php 

	?>
	<div class="tasklist" data-id="<?php echo $list->getId(); ?>">
		<div class="tasklist-header">
			<div class="tasklist-name">
				<span id="tasklist-name">
				<?php echo $list->getName(); ?></span>
				<span id="tasklist-name-edit">&#x270f;</span>
			</div>
			<div class="tasklist-add">
				<form class="tasklist-add-form" autocomplete="off">
					<div class="form-group">
						<input type="text" id="task-message" placeholder="Escribe tu tarea (presiona enter para agregar)" class="form-input">
					</div>
				</form>
			</div>
		</div>
		<div class="tasklist-body">
			<?php 
			if($tasks != null){
				foreach ($tasks as $task) {
				echo Task::MakeTask($task);
				}
			} 
			?>
		</div>
	</div>
	<div class="message-container">
		<div class="message">
			<div class="message-title">
				<span></span>
			</div>
			<div class="message-body">
				<span></span>
			</div>
		</div>
	</div>
	<div class="ins">
		<span>Doble click/tap para editar</span>
	</div>
	<?php include 'views/modules/scripts.php' ?>
	<script type="text/javascript">
		$('#toggle-user-options').on('click', () => {
			$('#user-options').slideToggle(300);
		});

		$(window).on('keypress', function(e){
			if(e.keyCode == 13){
				e.preventDefault();
				AddNewTask();
			}
		});
	</script>
</body>
</html>