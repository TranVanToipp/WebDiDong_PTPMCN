<?php
    class comment {
        private $comn;
		private $table = 'comment';
		
		public $id;
		public $parent_id;
        public $user_id;
        public $product_id;
        public $content_comment;
		public $number_stars;
        public $time_comment;

        public function __construct($db) {
            $this -> comn = $db;
        }

		
        public function insertComment() {
            $query = 'INSERT INTO '.$this->table.
            ' SET parent_id = :parent_id, user_id = :user_id,
             product_id = :product_id,
			 content_comment = :content_comment,
			 number_stars = :number_stars';

            $stmt = $this->comn->prepare($query);
			
			$this->parent_id = htmlspecialchars(strip_tags($this->parent_id));
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
			$this->product_id = htmlspecialchars(strip_tags($this->product_id));
			$this->content_comment = htmlspecialchars(strip_tags($this->content_comment));
			$this->number_stars = htmlspecialchars(strip_tags($this->number_stars));
            //ràng buộc các tham số
			$stmt->bindParam(':parent_id',$this->parent_id);
            $stmt->bindParam(':user_id',$this->user_id);
			$stmt->bindParam(':product_id',$this->product_id);
			$stmt->bindParam(':content_comment',$this->content_comment);
			$stmt->bindParam(':number_stars',$this->number_stars);

            //execute query
            if($stmt->execute()){
				return true;
			}
			return false;
        }
    }
?>