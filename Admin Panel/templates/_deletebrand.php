<?php

    
    require 'databaseconfig.php';

     if(isset($_GET["id"]) && !empty($_GET["id"])){

        $id = $_GET["id"];

        $deletesql = "DELETE FROM brand WHERE id = $id";

        $result = $con->query($deletesql);
    

        
        if($result){
         echo '<script> alert("Brand deleted Successfully"); history.back();</script>';
         
     }
     else{
         echo '<script> alert("Failed to delete brand");</script>';
     }
        
     }


?>