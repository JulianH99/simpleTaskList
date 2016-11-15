<?php

if(isset($_SESSION['user_id'])){

	$id = $_SESSION['user_id'];
	$user = $_SESSION['user_name'];

	$list = new TaskList($id);

	$list->getTaskListInfo($id);

	$tasks = $list->GetTasks();

	include 'views/tasklist.php';

}


