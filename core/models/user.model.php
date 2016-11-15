<?php
		
	/**
	* 
	*/
	class User
	{
		private $user;
		private $pass;
		private $con;
		private $id;
		private $state;
		
		function __construct($_user, $_pass)
		{
			$this->user = $_user;
			$this->pass = $_pass;
			$this->state = 1;
			$this->con = new Connection();

		}
		public function GetID(){
			return isset($this->id)?  $this->id : -1;
		}
		public function GetName(){
			return $this->user;
		}

		public function Create(){

			$sql = 'insert into users(user,pass,estado) values(:user,:pass,:state)';

			$smt = $this->con->prepare($sql);
			$smt->bindParam(':user',$this->user);
			$smt->bindParam(':pass',password_hash($this->pass,PASSWORD_DEFAULT));
			$smt->bindParam(':state',$this->state);

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
			$sql = 'select user_id, user, pass from users where user = :user limit 1';
			$smt = $this->con->prepare($sql);

			$params = array(':user' => $this->user);

			if($smt->execute($params)){

				$numrows = $smt->rowCount();
				if($numrows > 0){
					$userObject = $smt->fetch(PDO::FETCH_OBJ);
					if(password_verify($this->pass, $userObject->pass))
					{
						$this->id = $userObject->user_id;
						return $this->id;
					}
				}
				else{
					return 0;
				}
				
			}
			else{
				return -1;
			}
			

		}
		public function Exists(){

			$sql = 'select * from users where user = :user or pass = :pass';
			$smt= $this->con->prepare($sql);

			if($smt->execute(array(':user' =>  $this->user,
									':pass' => $this->pass))){
				$numrows = $smt->rowCount();
				if($numrows > 0){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return -1;
			}
		}

		
		
		function __destruct(){
			$this->con = null;
		}
	}