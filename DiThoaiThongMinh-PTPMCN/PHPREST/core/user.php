<?php

	class user{
		//db stuff
		private $comn;
		private $table = 'user';
		
		//user properties
		public $id;
		public $maUser;
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

		

		public function updateUser() {
			$id = $this->id;
			$maUser = $this->maUser;
			$fullname = $this->fullname;
			$email = $this->email;
			$phone_number = $this->phone_number;
			$address = $this->address;
			$userName = $this->userName;
			$password = $this->password;
			$role_id = $this->role_id;
			$query = 'UPDATE '.$this->table.' SET  
			fullname = '.$fullname.' maUser = '.$maUser.'
			email = '.$email.' 
			phone_number = '.$phone_number.' address = '.$address.' 
			userName = '.$userName.' password = '.$password.' 
			role_id = '.$role_id.'  WHERE id = '.$id;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			$stmt->bindParam(2,$this->maUser);
			$stmt->bindParam(2,$this->fullname);
			$stmt->bindParam(2,$this->email);
			$stmt->bindParam(2,$this->phone_number);
			$stmt->bindParam(2,$this->address);
			$stmt->bindParam(2,$this->userName);
			$stmt->bindParam(2,$this->password);
			$stmt->bindParam(2,$this->role_id);

			if($stmt->execute()){
				return true;
			}
			return false;
		}
		
		public function read_User(){
			
			$query = 'SELECT * FROM '.$this->table;
			
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
			
		}

		public function select_user_id() {
			$query = 'SELECT id FROM '.$this->table.' WHERE role_id=1';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function deleteUser() {
			$id = $this->id;
			$query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			return false;
		}

		
		
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.
			'SET fullname = :fullname, maUser = :maUser, email = :email,
			phone_number = :phone_number, address = :address,
			userName = :userName, password = md5(:password),
			role_id = 2';
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
			$stmt->bindParam(':maUser',$this->maUser);
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