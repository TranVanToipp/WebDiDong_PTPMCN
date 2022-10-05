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
		//page
		public $page;
		
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}
		//select loại sản phẩm
		public function read_type(){
			//create query
			$query = 'SELECT 
				p.id,
				p.product_type,
				c.name as product_type_name
				FROM '.$this->table.' p
				LEFT JOIN 
					product_type c ON p.product_type = c.id 
					GROUP BY product_type ';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		//select sản phẩm.
		public function read($num){
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
					WHERE p.product_type = ?
					ORDER BY p.created_at DESC LIMIT '.$num;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->product_type);
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
			$stmt = $this->comn->prepare($query);
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
		public function page($type){
			//lấy số lượng bản ghi
			$sum_row = $this->comn->query('SELECT COUNT(*) FROM '.$this->table.' WHERE product_type = '.$type.'')->fetchColumn();
			
			$page = $this->page;
			$per_page = 1;//so luong san pham tren 1 trang
			$start = ($page-1)*$per_page;
			$max_page = ceil($sum_row/$per_page);
			if(!isset($page)){
				$page = 1;
			}
			/*
			page = 1 =>start = 0  => (page-1)*per_page = (1-1)*20 = 0;
			page = 2 =>start = 20 => (page-1)*per_page = (2-1)*20 = 20;
			page = 3 =>start = 40 => (page-1)*per_page = (3-1)*20=40;
			
			bước 1: lấy tổng số lượng bản ghi
			bước 2: tính số page: max_page = ceil(sum_ban_ghi/per_page)
			bước 3: lấy sô page = $_GET['num_page']
			bước 4: tính start = (page-1)*per_page
			bước 5: list ds page
			*/
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
					WHERE p.product_type = '.$type.'
					ORDER BY p.created_at DESC LIMIT '.$start.', '.$per_page;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->page);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
	}

?>