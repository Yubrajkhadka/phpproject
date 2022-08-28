<?php

    //require mysql connection
    require('../database/DBController.php');


    //require Product Class
    require('../database/fetchproduct.php');

    //DBController object
    $db = new DBController();

    //product oblect
    $product = new Product($db);


    if(isset($_POST['itemid'])){

        $result = $product->getProduct($_POST['itemid']);

        echo json_encode($result);
    }
?>