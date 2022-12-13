<?php

	class product_type{
		
		private $comn;
		private $table = 'product_type';
		
		public $id;
		public $name;
		
		
		public function __construct($db){
			$this->comn=$db;
		}
		
		public function read_type(){
			//create query
			$query = 'SELECT *
				FROM '.$this->table;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		public function create(){
			$query = 'INSERT INTO '.$this->table. 
			' SET name = :name';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->name = htmlspecialchars(strip_tags($this->name));
			$stmt->bindParam(':name',$this->name);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}
?>