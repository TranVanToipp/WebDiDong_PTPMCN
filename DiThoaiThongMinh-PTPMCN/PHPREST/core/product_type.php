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
	}

?>