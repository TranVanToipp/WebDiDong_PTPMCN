<?php

	class product{
		//db stuff
		private $comn;
		private $table = 'product';
		
		//product properties
		public $id;
		public $product_type;
		public $product_type_name;
		public $title;
		public $price;
		public $discount;//% giảm giá
		public $thumnail;
		public $description;
		public $description2;
		public $created_at;
		
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->conn=$db;
		}
		//getting product from our database
		public function read(){
			//create query
			$query = 'SELECT 
				p.id,
				c.name as product_type_name,
				p.title,
				p.price,
				p.discount,
				p.thumnail,
				p.description,
				p.description2,
				p.created_at
				FROM '.$this->table.' p
				LEFT JOIN 
					product_type c ON p.product_type = c.id 
					ORDER BY p.created_at DESC';
			//prepare statement
			$stmt = $this->conn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
	}

?>