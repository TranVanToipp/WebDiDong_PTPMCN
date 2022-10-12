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

	}

?>