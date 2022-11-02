<?php
	class orders{
		//db stuff
		private $comn;
		private $table = 'orders';
		
		//cart properties
		public $id;
		public $user_id;
		public $maHD;
		public $user_name;
		public $gender;
		public $phone_number;
		public $tinh_tp;
		public $quan_huyen;
		public $xa_phuong;
		public $product;
		public $num;
		public $money;
		public $note;
		public $created_at;
		public $status;
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}

		public function select_orders_id(){
			$query = 'SELECT maHD FROM '.$this->table;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		public function select_orders(){
			$query = 'SELECT * FROM '.$this->table.' WHERE user_id = ?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->user_id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		
		
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.' SET user_id = :user_id, maHD = :maHD, user_name = :user_name, gender = :gender, phone_number = :phone_number, tinh_tp = :tinh_tp, 
					quan_huyen = :quan_huyen, xa_phuong = :xa_phuong, product = :product, num = :num, money = :money, note = :note, status = :status';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->user_id = htmlspecialchars(strip_tags($this->user_id));
			$this->user_name = htmlspecialchars(strip_tags($this->user_name));
			$this->maHD = htmlspecialchars(strip_tags($this->maHD));
			$this->gender = htmlspecialchars(strip_tags($this->gender));
			$this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
			$this->tinh_tp = htmlspecialchars(strip_tags($this->tinh_tp));
			$this->quan_huyen = htmlspecialchars(strip_tags($this->quan_huyen));
			$this->xa_phuong = htmlspecialchars(strip_tags($this->xa_phuong));
			$this->product = htmlspecialchars(strip_tags($this->product));
			$this->num = htmlspecialchars(strip_tags($this->num));
			$this->total_money = htmlspecialchars(strip_tags($this->money));
			$this->note = htmlspecialchars(strip_tags($this->note));
			$this->status = htmlspecialchars(strip_tags($this->status));
			
			//ràng buộc các tham số
			$stmt->bindParam(':user_id',$this->user_id);
			$stmt->bindParam(':user_name',$this->user_name);
			$stmt->bindParam(':maHD',$this->maHD);
			$stmt->bindParam(':gender',$this->gender);
			$stmt->bindParam(':phone_number',$this->phone_number);
			$stmt->bindParam(':tinh_tp',$this->tinh_tp);
			$stmt->bindParam(':quan_huyen',$this->quan_huyen);
			$stmt->bindParam(':xa_phuong',$this->xa_phuong);
			$stmt->bindParam(':product',$this->product);
			$stmt->bindParam(':num',$this->num);
			$stmt->bindParam(':money',$this->money);
			$stmt->bindParam(':note',$this->note);
			$stmt->bindParam(':status',$this->status);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		
		public function update(){
			//update query
			$query = 'UPDATE '.$this->table.' SET status = :status WHERE maHD =:maHD';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->maHD = htmlspecialchars(strip_tags($this->maHD));
			$this->status = htmlspecialchars(strip_tags($this->status));
			
			
			//ràng buộc các tham số
			$stmt->bindParam(':maHD',$this->maHD);
			$stmt->bindParam(':status',$this->status);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}

	}

?>