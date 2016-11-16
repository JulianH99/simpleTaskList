<?php

/**
* 
*/
class TaskList
{
	private $user;
	public $name;
	private $tasks;
	private $id;
	private $con;
	static $defaultName = 'TaskList';
	
	function __construct($_user='',$_name='')
	{
		$this->user = $_user;
		$this->name = $_name;
		$this->con = new Connection();
	}

	function setId($_id){
		$this->id = $_id;
	}
	function getId(){
		return isset($this->id)?  $this->id : -1;
	}
	function getName(){
		return $this->name;
	}
	function Create(){
		$sql = 'insert into tasklists(tasklist_name, tasklist_user_id) values(:name,:user)';
		$smt = $this->con->prepare($sql);

		$smt->bindParam(':name', $this->name);
		$smt->bindParam(':user', $this->user);

		if($smt->execute()){
			$last_id = $this->con->lastInsertId();
			$this->id = $last_id;
			return $this->id;
		}
		else{
			return -1;
		}

	}

	function SetName($_id){
		$sql = 'udpate tasklists set tasklist_name = :name where tasklist_id = :id and tasklist_user_id = :user_id';
		$smt = $this->con->prepare($sql);

		$smt->bindParam(':name', $this->name);
		$smt->bindParam(':id', $_id);
		$smt->bindParam(':user_id', $this->user);

		if($smt->execute()){
			return 1;
		}
		else{
			return 0;
		}
	}

	function getTaskListInfo($_user_id){
		$sql = 'select tasklist_id, tasklist_name, tasklist_user_id from tasklists where tasklist_user_id = :user_id';
		$smt = $this->con->prepare($sql);
		if($smt->execute(array($_user_id))){
		
			if($smt->rowCount() > 0){
				$taskObject = $smt->fetch(PDO::FETCH_OBJ);
				$this->id = $taskObject->tasklist_id;
				$this->name = $taskObject->tasklist_name;
				$this->user = $taskObject->tasklist_user_id;
			}
			else{
				return 0;
			}
		}
		else{
			return -1;
		}
		return $taskObject;
	}
	function GetTasks(){

		if(isset($this->id) && isset($this->user)){
			$task = new Task();
			if($tasks = $task->GetTask($this->id,$this->user,$this->con)){

				$this->tasks = $tasks;
				return $this->tasks;
			}
			else{
				return null;
			}

		}
		else{
			return null;
		}
	}
	function GetTaskById($_id){
		$sql = "call GetSingleTask(?)";

		$smt = $this->con->prepare($sql);

		$smt->bindParam(1,$_id,PDO::PARAM_INT);

		if($smt->execute()){
			return $smt->fetch(PDO::FETCH_OBJ);
		}
		else{
			return -1;
		}


	}

	public function EmptyList(){

		$sql = 'call EmptyList(:userid)';

		$smt = $this->con->prepare($sql);
		$smt->bindParam(':userid', $this->id);
		if($smt->execute()){
			$result = $smt->fetch(PDO::FETCH_BOTH);
			return $result[0] == 0? true : false;
		}
		else{
			return -1;
		}

	}
	public function AddNewTask($_message, $_list_id){
		$sql = "insert into tasks(task_title, task_message, estado, tasklist_id, task_createTime, estado_f)
    values ('', :message, 1, :listid, now(), 1 );";

		$smt = $this->con->prepare($sql);

		$smt->bindParam(':message', $_message);
		$smt->bindParam(':listid', $_list_id);

		if($smt->execute()){
			return $this->con->lastInsertId();
		}
		else{
			return -1;
		}
	}

	function __destruct(){
		$this->con = null;
	}


}