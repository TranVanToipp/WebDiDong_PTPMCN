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
		//select sản phẩm.
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
		//select 1 sản phẩm.
		public function read_single(){
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
					WHERE p.id = ?';
			//prepare statement
			$stmt = $this->conn->prepare($query);
			//ràng buộc
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->product_type_name = $row['product_type_name'];
			$this->title = $row['title'];
			$this->price = $row['price'];
			$this->discount = $row['discount'];
			$this->thumnail = $row['thumnail'];
			$this->description = $row['description'];
			$this->description2 = $row['description2'];
			$this->created_at = $row['created_at'];
			
		}
	}

?>