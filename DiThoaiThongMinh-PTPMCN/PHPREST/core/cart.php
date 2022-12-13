<?php

	class cart{
		//db stuff
		private $comn;
		private $table = 'cart';
		
		//cart properties
		public $id;
		public $user_id;
		public $user_name;
		public $product_id;
		public $price;
		public $num; //so luong sp
		public $title;
		public $discount;//% giảm giá
		public $thumnail;
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}
		
		public function select(){
			$query = 'SELECT c.id, 
			c.user_id, 
			c.user_name, 
			c.product_id, 
			c.price as discount, 
			c.num,
			p.title,
			p.price,
			p.thumnail
			
			FROM '.$this->table.' c 
			LEFT JOIN 
					product p ON c.product_id = p.id
					WHERE c.user_id = ?';
			

			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->user_id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		
		public function select_num_create(){
			$query = 'SELECT c.id, 
			c.user_id, 
			c.user_name, 
			c.product_id, 
			c.price,
			c.num 
			FROM '.$this->table.' c WHERE c.user_id = '.$this->user_id.' AND product_id = '.$this->product_id;
			

			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->user_id);
			$stmt->bindParam(2,$this->product_id);
			//execute query
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$this->id = $row['id'];
				$this->user_id = $row['user_id'];
				$this->user_name = $row['user_name'];
				$this->product_id = $row['product_id'];
				$this->num = $row['num'];
				$this->price = $row['price'];
			}
		}
		
		public function select_num(){
			$query = 'SELECT c.id, 
			c.user_id, 
			c.user_name, 
			c.product_id, 
			c.price,
			c.num
			
			FROM '.$this->table.' c WHERE c.id = ?';
			

			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$this->id = $row['id'];
				$this->user_id = $row['user_id'];
				$this->user_name = $row['user_name'];
				$this->product_id = $row['product_id'];
				$this->num = $row['num'];
				$this->price = $row['price'];
			}
		}
		
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.' SET user_id = :user_id, user_name = :user_name, product_id = :product_id, price = :price, num = :num';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->user_id = htmlspecialchars(strip_tags($this->user_id));
			$this->user_name = htmlspecialchars(strip_tags($this->user_name));
			$this->product_id = htmlspecialchars(strip_tags($this->product_id));
			$this->price = htmlspecialchars(strip_tags($this->price));
			$this->num = htmlspecialchars(strip_tags($this->num));
			
			//ràng buộc các tham số
			$stmt->bindParam(':user_id',$this->user_id);
			$stmt->bindParam(':user_name',$this->user_name);
			$stmt->bindParam(':product_id',$this->product_id);
			$stmt->bindParam(':price',$this->price);
			$stmt->bindParam(':num',$this->num);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		
		public function update(){
			//update query
			$query = 'UPDATE '.$this->table.' SET  price = :price, num = :num WHERE id =:id';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->price = htmlspecialchars(strip_tags($this->price));
			$this->num = htmlspecialchars(strip_tags($this->num));
			
			//ràng buộc các tham số
			$stmt->bindParam(':id',$this->id);
			$stmt->bindParam(':price',$this->price);
			$stmt->bindParam(':num',$this->num);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		
		public function deletes(){
			$id = $this->id;
			$query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->user_id);
			$stmt->bindParam(2,$this->product_id);
			
			if($stmt->execute()){
				return true;
			}
			return false;
			
		}

	}

?>