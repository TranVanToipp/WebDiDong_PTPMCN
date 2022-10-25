<?php
    class quanhuyen {
        private $table = 'devvn_quanhuyen';
        private $comn;
        public $maqh;
        public $name;
        public $type;
        public $matp;


        public function __construct($db) {
            $this->comn = $db;
        }

        public function getQuanHuyen() {
            $query = 'SELECT * FROM '.$this->table.'
            WHERE matp = ?';
        }
    }
?>