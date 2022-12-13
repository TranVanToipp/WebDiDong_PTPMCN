<?php
	class discount_sale {
		//db stuff
		private $comn;
		private $table = 'discount_sale';
		
		//cart properties
		public $id;
		public $id_product_sale;
		public $discount_product_sale;
		public $number_sale;
		public $num_buy;
		public $status_sale;
		public $time_sale;
		public $time_salestop;
		//hàm tạo với kết nối db
		public function __construct($db){
			$this->comn=$db;
		}
		
		public function select_single(){
			$query = 'SELECT id, id_product_sale, discount_product_sale, number_sale, num_buy, status_sale, time_sale, time_salestop FROM '.$this->table.' WHERE id_product_sale = ?';
			$stmt = $this->comn->prepare($query);
            $stmt->bindParam(1,$this->id_product_sale);
            //execute query
            $stmt->execute();
            
            return $stmt;
		}
		public function create(){
			//create query
			$query = 'INSERT INTO '.$this->table.' (id_product_sale, discount_product_sale,
			 number_sale, num_buy, status_sale, time_sale, time_salestop) 
			 VALUES (:id_product_sale, :discount_product_sale ,:number_sale,
			 :num_buy, :status_sale ,:time_sale , :time_salestop)';
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->id_product_sale = htmlspecialchars(strip_tags($this->id_product_sale));
			$this->discount_product_sale = htmlspecialchars(strip_tags($this->discount_product_sale));
			$this->number_sale = htmlspecialchars(strip_tags($this->number_sale));
			$this->num_buy = htmlspecialchars(strip_tags($this->num_buy));
			$this->status_sale = htmlspecialchars(strip_tags($this->status_sale));
			$this->time_sale = htmlspecialchars(strip_tags($this->time_sale));
			$this->time_salestop = htmlspecialchars(strip_tags($this->time_salestop));
			
			//ràng buộc các tham số
			$stmt->bindParam(':id_product_sale',$this->id_product_sale);
			$stmt->bindParam(':discount_product_sale',$this->discount_product_sale);
			$stmt->bindParam(':number_sale',$this->number_sale);
			$stmt->bindParam(':num_buy',$this->num_buy);
			$stmt->bindParam(':status_sale',$this->status_sale);
			$stmt->bindParam(':time_sale',$this->time_sale);
			$stmt->bindParam(':time_salestop',$this->time_salestop);
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}
		
		public function update($i){
			$id_product_sale = $this->id_product_sale;
			$num_buy = $this->num_buy;
			$status = $this->status;
			//update query
			if($i == 0){
				$query = 'UPDATE '.$this->table.' SET num_buy = '.$num_buy.' WHERE id_product_sale  = '.$id_product_sale;
			}
			else if($i==1){
				$query = 'UPDATE '.$this->table.' SET num_buy = '.$num_buy.', status_sale = '.$status.' WHERE id_product_sale  = '.$id_product_sale;
			}
			//prepare statement
			$stmt = $this->comn->prepare($query);
			//clead data
			/* vì thông tin sẻ được lưu vào csdl của chúng ta đến từ các yêu cầu của người dùng,
			loại bỏ các vấn đề không mong muốn */
			$this->id_product_sale = htmlspecialchars(strip_tags($this->id_product_sale));
			$this->num_buy = htmlspecialchars(strip_tags($this->num_buy));
			$this->status = htmlspecialchars(strip_tags($this->status));
			
			//ràng buộc các tham số
			$stmt->bindParam(1,$this->id_product_sale);
			$stmt->bindParam(2,$this->num_buy);
			$stmt->bindParam(3,$this->status);
			
			//execute query
			if($stmt->execute()){
				return true;
			}
			return false;
		}

	}

?>