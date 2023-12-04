<?php

class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;


	private $dataBaseHandler;
	private $statment;

	public function __construct(){
		$dataSourceName = 'mysql:host='.$this->host.';dbname='.$this->db_name;
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try{
			$this->dataBaseHandler = new PDO($dataSourceName, $this->user, $this->pass, $option);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function query($query){
		$this->statment = $this->dataBaseHandler->prepare($query);
	}

	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->statment->bindValue($param, $value, $type);
	}

	public function execute(){
	    try {
	        $this->statment->execute();
	    } catch (PDOException $e) {
	        echo "Error: " . $e->getMessage();
	        die();
	    }
	}

	public function resultSet(){
		$this->execute();
		return $this->statment->fetchall(PDO::FETCH_ASSOC);
	}

	public function single(){
		$this->execute();
		return $this->statment->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount(){
		return $this->statment->rowCount();
	}
}