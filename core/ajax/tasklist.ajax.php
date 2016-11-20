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
if(isset($_GET['delete'])){

    $task_id = $_POST['id'];
    $list_id = $_POST['list_id'];

    $list = new TaskList();
    $list->setId($list_id);

    if($list->DeleteTask($task_id)){
        $result = array(
            'title' => 'Hasta nunca...',
            'body' => '',
            'class' => 'info'
            );
    }
    else{
        $result = array(
            'title' => '¡Oh no!',
            'body' => '¡Ha ocurrido un error!',
            'class' => 'error'
            );
    }
    header('content-type: application/json');
    echo json_encode($result);

}
if (isset($_GET['mark'])) {
    
    $taskid = $_POST['taskid'];
    $listid = $_POST['listid'];

    $list = new TaskList();
    $list->setId($listid);

    if($list->MarkTask($taskid) != 0){
        echo 'SUCCESS';
    }
    else{
        echo 'ERRROR';
    }
}
if(isset($_GET['deleteall'])){

    $listid = $_POST['listid'];
    $tasks = $_POST['ids'];
    
    $list = new TaskList();
    $list->setId($listid);
    $cont = 0;
    $ref = count($tasks);
    foreach ($tasks as $task) {
        if($list->DeleteTask($task))
        {
            $cont++;
        }
    }
    if($cont === $ref){
        echo "SUCCESS";
    }
    else{
        echo array($count,$ref);
    }
}

if(isset($_GET['changetask'])){
    $id = $_POST['id'];
    $message = $_POST['message'];

    $task = new Task();
    $task->setID($id);
    $con = new Connection();
    if($task->ChangeMessage($message, $con)){
        echo "SUCCESS";
    }else{
        echo 0;
    }
}
if(isset($_GET['changelist'])){

    $id = $_POST['id'];
    $name = $_POST['name'];

    $list = new TaskList();
    $list->setId($id);
    if($list->SetName($name)){
        echo 'SUCCESS';
    }else{
        echo $name;
    }
}