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
		public $num;//số lượng sản phẩm
		public $thumnail;
		public $description;
		public $description2;
		public $created_at;

		//Mô tả sản phẩm
		public $configuration;
		//thông tin chung
		public $thongtinchung;
		//tt sản phẩm
		public $thongtinsp;
		//page
		public $page;
		public $max_page;
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

		public function sortBangChuCai(){
			//create query
			$query = 'SELECT * FROM '.$this->table.' 
					ORDER BY thumnail ASC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function sortGiamGia(){
			//create query
			$query = 'SELECT * FROM '.$this->table.' 
					ORDER BY discount DESC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		//seletct tất cả các sản phẩm
		public function productALl(){
			//create query
			$query = 'SELECT * FROM '.$this->table;
				
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		// Sắp xếp sản phẩm giảm dần
		public function sortGiam(){
			//create query
			$query = 'SELECT * FROM '.$this->table.' 
					ORDER BY price DESC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function sortTang(){
			//create query
			$query = 'SELECT * FROM '.$this->table.' 
					ORDER BY price ASC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function selectAll(){
			//create query
			$query = 'SELECT 
				p.id,
				p.product_type,
				c.name as product_type_name,
				p.title,
				p.price,
				p.discount,
				p.num,
				p.thumnail,
				p.description,
				p.description2,
				p.created_at
				FROM '.$this->table.' p
				LEFT JOIN 
					product_type c ON p.product_type = c.id 
					ORDER BY p.created_at DESC';
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
				p.num,
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
				p.num,
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
			$num = $stmt->rowCount();
			if($num>0){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$this->product_type_name = $row['product_type_name'];
				$this->title = $row['title'];
				$this->price = $row['price'];
				$this->discount = $row['discount'];
				$this->num = $row['num'];
				$this->thumnail = $row['thumnail'];
				$this->description = $row['description'];
				$this->description2 = $row['description2'];
				$this->created_at = $row['created_at'];
			}
		}
		public function img_desct(){
			$table = 'img_desct';
			$query = 'SELECT 
				img.id,
				img.product_id,
				img.img_desct
				FROM '.$table.' img
					WHERE img.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function discount() {
			$table = 'discount';
			$query = 'SELECT 
				dis.id,
				dis.product_id,
				dis.discount_text
				FROM '.$table.' dis
					WHERE dis.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function configuration (){
			$table = 'configuration';
			$query = 'SELECT 
				conf.id,
				conf.product_id,
				conf.screen,
				conf.operating_system,
				conf.front_camera,
				conf.rear_camera,
				conf.chip,
				conf.ram,
				conf.sim,
				conf.pin
				FROM '.$table.' conf
					WHERE conf.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function thongtinchung (){
			$table = 'thongtinchung';
			$query = 'SELECT 
				ttchung.id,
				ttchung.product_id,
				ttchung.thoidiemramat
				FROM '.$table.' ttchung 
					WHERE ttchung.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function thongtinsp (){
			$table = 'thongtinsp';
			$query = 'SELECT 
				ttsanpham.id,
				ttsanpham.product_id,
				ttsanpham.thuonghieu 
				FROM '.$table.' ttsanpham
					WHERE ttsanpham.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			return $stmt;
		}

		public function tienich (){
			$table = 'tienich';
			$query = 'SELECT 
				tienich.id,
				tienich.product_id,
				tienich.baomatnangcao,
				tienich.ghiam 
				FROM '.$table.' tienich
					WHERE tienich.product_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}


		public function page(){
			$type = $this->product_type;
			//lấy số lượng bản ghi
			$sum_row = $this->comn->query('SELECT COUNT(*) FROM '.$this->table.' WHERE product_type = '.$type.'')->fetchColumn();
			
			$page = $this->page;
			$per_page = 1;//so luong san pham tren 1 trang
			$start = ($page-1)*$per_page;
			//tính max page
			$max_page = ceil($sum_row/$per_page);
			$this->max_page = $max_page;
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
			$stmt->bindParam(2,$this->product_type);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		public function search(){
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
					WHERE p.title LIKE "%'.$this->title.'%"';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//ràng buộc
			$stmt->bindParam(1,$this->title);
			//execute query
			$stmt->execute();
			return $stmt;
		}
		//create function update số lượng sản phẩm khi thêm vào giỏ hàng
		public function update_num_product(){
			$id = $this->id;
			$num = $this->num;
			$query = 'UPDATE '.$this->table.' SET  num = '.$num.' WHERE id = '.$id;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			$stmt->bindParam(2,$this->num);
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function delete_product(){
			$id = $this->id;
			$query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}

?>