<?php

	/**
	* 
	*/
	class Task
	{
		private $title;
		private $message;
		private $createTime;
		private $done;
		private $id;

		function __construct($_title='',$_message='', $_createTime = '', $_done = false, $_id = 0){
			$this->title = $_title;
			$this->message = $_message;
			$this->createTime = $_createTime;
			$this->done = $_done;
			$this->id = $_id;
		}
		
		function Delete($_id,$_tlist, PDO $_con){
			$sql = 'update tasks set estado = 0 where task_id = :id and tasklist_id = :tid';

			$smt = $_con->prepare($sql);


			if($smt->execute(array(':id' => $_id,
									':tid' => $_tlist))){
				return 1;
			}
			else{
				return 0;
			}
		}
		function GetTask($_tid, $_user_id, PDO $_con){
			$sql = 'call GetTask(:tasklist,:user)';

			$smt = $_con->prepare($sql);

			$smt->bindParam(':tasklist', $_tid);
			$smt->bindParam(':user',$_user_id);

			if($smt->execute()){

				while($row = $smt->nextRowSet()){

					$tasks[] = $row->fetchAll();
				}
			}
			else{
				return null;
			}
			return $tasks;
		}
	}