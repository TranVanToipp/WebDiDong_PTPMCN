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
		public $month;
		public $year;
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}
		
		public function get_orders_status(){
			$query = 'SELECT status FROM '.$this->table.' 
			WHERE id =?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			//execute query
			$stmt->execute();
			
			return $stmt;
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
		
		public function select_orders_All(){
			$query = 'SELECT o.id, o.maHD, p.title, o.user_name, o.gender, o.phone_number, o.note, tp.nameTP, qh.nameQH, xp.nameXa, o.num, o.money, o.created_at, s.name_status 
			FROM '.$this->table.' o LEFT JOIN devvn_tinhthanhpho tp ON  o.tinh_tp = tp.matp 
			LEFT JOIN devvn_quanhuyen qh ON  o.quan_huyen = qh.maqh 
			LEFT JOIN devvn_xaphuongthitran xp ON  o.xa_phuong = xp.xaid  
			LEFT JOIN product p ON o.product = p.id 
			LEFT JOIN status_orders s ON o.status = s.id 
			ORDER BY o.created_at DESC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}

		public function statistical_MONTH(){
			$year = $this->year;
			$query = 'SELECT SUM(money) AS tongTien, MONTH(created_at) AS thang FROM '.$this->table.' WHERE YEAR(created_at) = '.$year.' GROUP BY MONTH(created_at)';
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->year);
			$stmt->execute();
			return $stmt;
		}
		
		public function statistical_DAY(){
			$year = $this->year;
			$month = $this->month;
			$query = 'SELECT SUM(money) AS tongTien, DAY(created_at) AS ngay FROM '.$this->table.' WHERE YEAR(created_at) = '.$year.' AND MONTH(created_at) = '.$month.' GROUP BY DAY(created_at)';
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->year);
			$stmt->bindParam(2,$this->month);
			$stmt->execute();
			return $stmt;
		}

		public function select_order_buying() {
			$query = 'SELECT o.id, o.maHD, p.title, p.thumnail, o.user_name, o.gender, o.phone_number, o.note, o.num, o.money, o.created_at, s.name_status, tp.nameTP, qh.nameQH, xp.nameXa 
			FROM '.$this->table.' o
			LEFT JOIN product p ON o.product = p.id 
			LEFT JOIN devvn_tinhthanhpho tp ON  o.tinh_tp = tp.matp 
			LEFT JOIN devvn_quanhuyen qh ON  o.quan_huyen = qh.maqh 
			LEFT JOIN devvn_xaphuongthitran xp ON  o.xa_phuong = xp.xaid  
			LEFT JOIN status_orders s ON o.status = s.id 
			WHERE o.user_id = ?
			ORDER BY o.created_at DESC';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->user_id);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		
		public function select_orders_All_TT(){
			$query = 'SELECT o.id, o.maHD, p.title, o.user_name, o.gender, o.phone_number, o.note, tp.nameTP, qh.nameQH, xp.nameXa, o.num, o.money, o.created_at, s.name_status 
			FROM '.$this->table.' o LEFT JOIN devvn_tinhthanhpho tp ON  o.tinh_tp = tp.matp 
			LEFT JOIN devvn_quanhuyen qh ON  o.quan_huyen = qh.maqh 
			LEFT JOIN devvn_xaphuongthitran xp ON  o.xa_phuong = xp.xaid  
			LEFT JOIN product p ON o.product = p.id 
			LEFT JOIN status_orders s ON o.status = s.id 
			WHERE status =?';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->status);
			//execute query
			$stmt->execute();
			
			return $stmt;
		}
		
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.' 
			SET user_id = :user_id, maHD = :maHD, user_name = :user_name, gender = :gender, phone_number = :phone_number, tinh_tp = :tinh_tp, 
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
		public function delete_order(){
			$query = 'DELETE FROM '.$this->table.' WHERE id = ?';
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		public function update(){
			$id = $this->id;
			$status = $this->status;
			//update query
			$query = 'UPDATE '.$this->table.' SET status = '.$status.' WHERE id  = '.$id;
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->status = htmlspecialchars(strip_tags($this->status));
			
			
			//ràng buộc các tham số
			$stmt->bindParam(1,$this->id);
			$stmt->bindParam(2,$this->status);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}

	}

?>