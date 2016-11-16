<?php

if(isset($_GET['add'])){

    $message = $_POST['message'];
    $list_id = $_POST['list_id'];

    $list = new TaskList();
    $result = '';

    if(($task_id  = $list->AddNewTask($message,$list_id)) != -1){
        
        if(($task = $list->GetTaskById($task_id) )!= null){	
            $result = Task::MakeTask($task);
        }
    }
    else{
        echo "error 1";
    }
    echo $result;
}