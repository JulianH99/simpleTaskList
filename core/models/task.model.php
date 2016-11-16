<?php

	/**
	* 
	*/
	class Task
	{
		private $message;
		private $createTime;
		private $done;
		private $id;

		function __construct($_title='',$_message='', $_createTime = '', $_done = false){
			$this->message = $_message;
			$this->createTime = $_createTime;
			$this->done = $_done;
		}

		public function setID($_id){
			$this->id = $_id;
		}
		
		function MarkAsDone($_id,$_tlist, PDO $_con){
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
			$sql = 'call GetTask(?,?)';

			$smt = $_con->prepare($sql);

			$smt->bindParam(1, $_tid, PDO::PARAM_INT);
			$smt->bindParam(2,$_user_id, PDO::PARAM_INT);

			$tasks = array();

			$smt->execute();

			while($row = $smt->fetch(PDO::FETCH_OBJ)){

				$tasks[] = $row;

			}
			return $tasks;
			
		}
		public static function MakeTask($_task){

			$state = "";
			$checked = "";
			if($_task->estado  == 0){
				$state = "done";
				$checked = "checked";
			}

			return "<div class='task $state'>
				<div class='task-header'>
				</div>
				<div class='task-body'>
					<span>$_task->task_message</span>
				</div>
				<div class='task-footer'>

					<span>$_task->createTime</span>
					<a class='button erase' title='Borrar tarea' id='erase' data-id='$_task->task_id'>&#x2718;</a>
					<a class='button' id='mark-as-done'><input type='checkbox' id='done'
					 data-id='$_task->task_id' title='Marcar como hecha' $checked></a>
				</div>
			</div>";

		}
	}