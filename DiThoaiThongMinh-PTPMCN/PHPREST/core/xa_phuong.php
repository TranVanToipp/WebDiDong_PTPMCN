<?php
    class xaphuong {
        private $comn;
        private $table = 'devvn_xaphuongthitran';
        public $xaid;
        public $name;
        public $type;
        public $maqh;

        //Hàm kết nối db
        public function __construct($db) {
            $this->comn=$db;
        }

        public function getXaPhuong() {
            $query = 'SELECT * FROM '.$this->table.' WHERE maqh = ?';
			
			$stmt = $this->comn->prepare($query);
			$stmt->bindParam(1,$this->maqh);
			//execute query
			$stmt->execute();
			
			return $stmt;
        }
    }
?>