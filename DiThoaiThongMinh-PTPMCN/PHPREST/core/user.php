<?php

	class user{
		//db stuff
		private $comn;
		private $table = 'user';
		
		//user properties
		public $id;
		public $fullname;
		public $email;
		public $phone_number;
		public $address;
		public $userName;
		public $password;
		public $role_id;
		public $created_at;
		
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}
		
		public function read_User(){
			
			$query = 'SELECT * FROM '.$this->table;
			
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
			
		}
		
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.' SET fullname = :fullname, email = :email, phone_number = :phone_number, address = :address, userName = :userName, password = md5(:password), role_id = 2';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->fullname = htmlspecialchars(strip_tags($this->fullname));
			$this->email = htmlspecialchars(strip_tags($this->email));
			$this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
			$this->address = htmlspecialchars(strip_tags($this->address));
			$this->userName = htmlspecialchars(strip_tags($this->userName));
			$this->password = htmlspecialchars(strip_tags($this->password));
			
			//ràng buộc các tham số
			$stmt->bindParam(':fullname',$this->fullname);
			$stmt->bindParam(':email',$this->email);
			$stmt->bindParam(':phone_number',$this->phone_number);
			$stmt->bindParam(':address',$this->address);
			$stmt->bindParam(':userName',$this->userName);
			$stmt->bindParam(':password',$this->password);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
	}

?>