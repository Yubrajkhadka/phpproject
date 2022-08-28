<?php

    
    require 'databaseconfig.php';

     if(isset($_GET["id"]) && !empty($_GET["id"])){

        $id = $_GET["id"];
        $deletecart = $con->query("DELETE FROM cart_table WHERE product_id = $id");

        $deletesql = "DELETE FROM product_table WHERE id = $id";

        $result = $con->query($deletesql);
        
        if($result){
         echo '<script> alert("Mobile deleted Successfully"); history.back();</script>';
      
      }
      else{
         echo '<script> alert("Failed to delete mobile");</script>';
      } 

        
        
     }


?>