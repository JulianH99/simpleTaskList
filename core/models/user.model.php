<?php
		
	/**
	* 
	*/
	class User
	{
		private $user;
		private $pass;
		private $con;
		public $id;
		
		function __construct($_user, $_pass)
		{
			$this->user = $_user;
			$this->pass = password_hash($_pass,PASSWORD_DEFAULT);
			$this->con = new Connection();
		}

		public function Create(){

			$sql = 'insert into users values(:user,:pass)';

			$smt = $this->con->prepare($sql);
			$smt->bindParam(':user',$this->user);
			$smt->bindParam(':pass',$this->pass);

			if($smt->execute()){
				$last_id = $this->con->lastInsertId();
				$this->id = $last_id;
				return $this->id;
			}
			else{
				$exec = -1;
			}
			$smt = null;
			return $exec;
		}
		public function Login(){
			$sql = 'select user_id, user, pass from users where user = :user and pass = :pass limit 1';
			$smt = $this->con->prepare($sql);

			$params = array(':user' => $this->user,
							':pass' => $this->pass);

			if($smt->execute($params)){

				$numrows = $smt->rowCount();
				if($numrows > 0){
					$userObject = $smt->fetch(PDO::FETCH_OBJ);
					$this->name = $userObject->user;
					$this->id = $userObject->user_id;
				}
				else{
					return 0;
				}
				
			}
			else{
				return -1;
			}
			return array('id' => $userObject->user_id,
						  'name' => $userObject->user);

		}
		public function Exists(){

			$sql = 'select * from user where user = :user or pass = :pass';
			$smt= $this->con->prepare($sql);

			if($smt->execute(array(':user' =>  $this->user,
									':pass' => $this->pass))){
				$numrows = $smt->rowCount();
				return $numrows;
			}
			else{
				return -1;
			}
		}

		function __destruct(){
			$this->con = null;
		}
	}