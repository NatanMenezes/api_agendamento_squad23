<?php

	namespace Source\Controller;
	
	class Calendario{

		 private $id = 0;
		 private $data = null;
		 private $local = null;

		 public function setId(int $id ):void{
		 	$this->id = $id;
		 }

		 public function getId() :int{
		 	return $this->id;
		 }

		 public function setData(string $data):void{
		 	$this->data = $data;
		 }

		 public function getData() :string{
		 	return $this->data;
		 }

		 public function setLocal(string $local):void{
		 	$this->local = $local;
		 }

		 public function getLocal() :string{
		 	return $this->local;
		 }

		 /////

		 private function connection() :\PDO {
		 	return new \PDO ("mysql:host=localhost;dbname=sistema_agendamento", "root", "");
		 }

		 public function read() :array
		 {
		 	$con = $this->connection(); 

		 	if ($this->getId() === 0){
		 		$stmt = $con->prepare("SELECT * FROM agendamentos"); 

		 		if($stmt->execute()){
		 			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		 		}

		 	}
		 	else if ($this->getId() > 0){
		 		$stmt = $con->prepare("SELECT * FROM agendamentos WHERE id = :_id");
		 		$stmt->bindValue(":_id", $this->getId(), \PDO::PARAM_INT); // testar sem int
		 		if ($stmt->execute()){
		 			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		 		}
		 		
		 	}
		 	return [];
		 }

		 
	}	

?>