<?php
class sale{
    //db stuff
    private $comn;
    private $table = 'discount_sale';
//product sale

    public $product_idsale;
    public $status_sale;
    public $time_sale;
    public $time_salestop;

    public function __construct($db){
        $this->comn=$db;
    }

    public function read_sale() {
        $query = 'SELECT * 
            FROM '.$this->table.' s
            LEFT JOIN 
             product p ON s.id_product_sale = p.id';
        //prepare statement
        $stmt = $this->comn->prepare($query);
        //execute query
        $stmt->execute();
        
        return $stmt;
    }

    public function read_sale_single() {   
            $query = 'SELECT * 
                FROM '.$this->table.' s 
                LEFT JOIN 
                product p ON s.id_product_sale = p.id 
                WHERE s.id_product_sale = ? ';
            //prepare statement
            $stmt = $this->comn->prepare($query);
            $stmt->bindParam(1,$this->product_idsale);
            //execute query
            $stmt->execute();
            
            return $stmt;
    }

}

?>