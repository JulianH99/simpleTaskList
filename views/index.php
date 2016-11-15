<?php

	if(isset($_SESSION['user_id'])){
		include('core/controllers/tasklist.controller.php');
	}else{
		include('views/login.php');
	}