<?php

/**
* 
*/
class TaskList
{
	private $user;
	private $name;
	private $tasks;
	private $id;
	private $con;
	
	function __construct($_user='',$_name='')
	{
		$this->user = $_user;
		$this->name = $_name;
		$this->con = new Connection();
	}
	function Create(){
		$sql = 'insert into tasklists(tasklist_name, tasklist_user_id) values(:name,:user)';
		$smt = $this->con->prepare($sql);

		$smt->bindParam(':name', $this->name);
		$smt->bindParam(':user', $this->user);

		if($smt->execute()){
			return $this->con->lastInsertId();
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


}