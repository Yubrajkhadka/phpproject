<?php

class Product{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) 
            return null;
        $this->db = $db; 
    }

    //fetch product information
    public function getData($table = 'product_table'){
       $result = $this->db->con->query("SELECT * FROM {$table}");

       $resultArray = array();
        //fetch product one by one
       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }
    public function getTopSelling($table= 'product_table'){
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY number_of_sells LIMIT 10");

       $resultArray = array();
       
        //fetching product one by one
       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getOnSale($table= 'product_table'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_price != discounted_price LIMIT 15");

       $resultArray = array();
        //fetch product one by one
       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getNewPhones($table= 'product_table'){
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY launch_year LIMIT 10");

       $resultArray = array();
        //fetch product one by one
       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }
    public function getProductDetails($name){
        $result = $this->db->con->query("SELECT * FROM product_table WHERE product_name = '$name'");

       $resultArray = array();
        //fetch product one by one
       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    //get cart items from cart_table
    public function getCartData( $uid, $table = 'cart_table'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id = $uid");
 
        $resultArray = array();
         //fetch product one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
     } 
    

     //get products product_id
     public function getProduct($product_id=null, $table = "product_table"){
     
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE id = $product_id");
 
        $resultArray = array();
         //fetch product one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

}
?>