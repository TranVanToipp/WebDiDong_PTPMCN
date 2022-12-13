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
		
		public function selectCommentNewDate(){
			$query = 'SELECT c.id, c.parent_id, c.user_id, u.fullname, c.product_id, 
			c.content_comment, c.number_stars, c.time_comment FROM '.$this->table.' c 
			LEFT JOIN user u ON c.user_id = u.id 
			ORDER BY c.time_comment DESC LIMIT 1';
			
			$stmt = $this->comn->prepare($query);
			
			$stmt->execute();
            return $stmt;
		}
		
		
        public function selectAllComment() {
            $query = 'SELECT c.id, c.parent_id, c.user_id, u.fullname, c.product_id, 
			c.content_comment, c.number_stars, c.time_comment FROM '.$this->table.' c 
			LEFT JOIN user u ON c.user_id = u.id  
			WHERE c.product_id = ? AND c.parent_id = 0 
			ORDER BY c.time_comment DESC';

            $stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->product_id);
            $stmt->execute();
            return $stmt;
        }
		
		public function selectAllCommentReply() {
            $query = 'SELECT c.id, c.parent_id, c.user_id, u.fullname, c.product_id, 
			c.content_comment, c.number_stars, c.time_comment FROM '.$this->table.' c 
			LEFT JOIN user u ON c.user_id = u.id 
			WHERE c.product_id = ? AND c.parent_id = ? 
			ORDER BY c.time_comment DESC';

            $stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->product_id);
			$stmt->bindParam(2,$this->parent_id);
            $stmt->execute();
            return $stmt;
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

        public function deleteComment() {
            $id = $this->id;
            $query = 'DELETE FROM '.$this->table.' WHERE id = '.$id;
			$query_reply = 'DELETE FROM '.$this->table.' WHERE parent_id = '.$id;
            $stmt = $this->comn->prepare($query);
			$stmt2 = $this->comn->prepare($query_reply);
            $stmt-> bindParam(1,$this->id);

            $stmt->execute();
			$stmt2->execute();
        }
    }
?>