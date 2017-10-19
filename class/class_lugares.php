<?php
class Lugares{
 
    // database connection and table name
    private $conn;
    private $table_name = "lugares";
 
    // object properties
    public $lugarid;
    public $lugartipoid;	
    public $name;
    public $address;
    public $phone;	
    public $category;	
    public $price;
    public $image;
    public $reservation;
    public $delivery;
    public $creditcards;	
    public $goodfor;	
    public $goodkids;	
    public $goodgroups;	
    public $alcohol;
    public $wifi;
    public $tv;			
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read products
function read(){
 
    // select all query
    $query = "SELECT
               *
            FROM
                " . $this->table_name;
               
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}