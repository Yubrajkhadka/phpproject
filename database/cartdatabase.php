<?php 

class Cart{

    public $db = null;

    public function __construct(DBController $db){
        if(isset($this->con))
            return null;
        $this->db = $db;
    }

    //insert into cart
    public function insertintoCart($params = null,$table = "cart_table"){
        if($this->db->con!=null){
            if($params!=null){
                
                $columns = implode(',',array_keys($params));

               
                
                $values = implode(',',array_values($params));
               
                //sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)",$table,$columns,$values);
                
                
                $result = $this->db->con->query($query_string);

                return $result;
                
                
            }
        }
    }
    //to get user_id and product_id and insert into cart_table
    public function addToCart($userid,$itemid){
        if(isset($userid) && isset($itemid)){

            $params = array(
                "user_id"=> $userid,
                "product_id"=>$itemid

            );
            //insert into cart_table
            $result = $this->insertintoCart($params);
            
            if($result){
                //RELOAD PAGE
                
                header("location:cart.php");
            }

        }
    }
    //calculate subtotal 
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum+=floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }
    //delete cart item using cart item id
    public function deleteCartItem($item_id = null , $user_id = null, $table = "cart_table"){
    
        if($item_id!=null){

            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id = {$item_id} AND user_id = {$user_id}");
            if($result){
            
                
                header("location:".$_SERVER['PHP_SELF']);
            }
            
            return $result;
        }

    }

    //get product id of shopping cart
    public function getCartId($cartArray = null , $key = "product_id"){
        
        if($cartArray !=null){
            $cart_id = array_map(function($value)use($key){

                return $value[$key];

            },$cartArray);
            return $cart_id;
        }
    }

    //save product
    public function saveProduct($user_id=null,$product_id=null,$saveTable="wishlist_table",$fromTable = "cart_table"){
        if($product_id !=null and $user_id !=null){

            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE user_id = {$user_id} AND product_id = {$product_id};";
            $query.="DELETE FROM {$fromTable} WHERE user_id = {$user_id} AND product_id = {$product_id};";
            
            //execute multiple query
            $result = $this->db->con->multi_query($query);
            
            if($result){
                $this->db->con->close();
                header("location:".$_SERVER['PHP_SELF']);
            }
            
            return $result;
        }
    }

}

?>