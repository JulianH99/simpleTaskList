<?php
	/**
	* 
	*/
	class Connection extends PDO
	{
		
		function __construct()
		{
			try{
				parent::__construct("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
				$this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return $e->getMessage();
			}
		}
		
	}