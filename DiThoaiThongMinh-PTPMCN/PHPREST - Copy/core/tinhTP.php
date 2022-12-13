<?php
    class tinhTP {
        private $comn;
        private $table = 'devvn_tinhthanhpho';
        public $matp;
        public $name;
        public $type;
        public $slug;

        //Hàm kết nối db
        public function __construct($db) {
            $this->comn=$db;
        }

        public function getdevvn_TinhALL() {
            $query = 'SELECT * FROM '.$this->table;
            $stmt = $this->comn->prepare($query);
			//execute query
			$stmt->execute();
			
			return $stmt;
        }
        
    }
?>