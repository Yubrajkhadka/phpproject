<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php 
session_start();
require 'databaseconfig.php';
require 'functions.php';
if(isset($_POST['action'])){

    $select_sql = "SELECT * FROM  product_table WHERE stock !=0 AND brand !=''"; 
    if(isset($_POST['brand'])){
        $brand = implode("','", $_POST['brand']);
        $select_sql .=" AND brand IN('".$brand."')";
        
    }
    
    
    if(isset($_POST['minimum_price'],$_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])){
        $select_sql .= "AND product_price >=".$_POST['minimum_price']." AND product_price <= ".$_POST['maximum_price']."";
    }

    
    if(isset($_POST['ram'])){
        $ram = implode(",",$_POST['ram']);
        $select_sql .=" AND ram IN (".$ram.")";
    }
    if(isset($_POST['rom'])){
        $rom = implode(",",$_POST['rom']);
        $select_sql .= " AND hdd IN(".$rom.")";

    }
    
    if(isset($_POST['processor'])){
        $processor = implode(",", $_POST['processor']);
        $select_sql .= " AND processor IN('".$processor."')";
    }
     
    if(isset($_POST['screen_size'])){
        $screen_size = implode(",",$_POST['screen_size']);
        $select_sql .=" AND screen_size IN(".$screen_size.")";
        
        
    }
    if(isset($_POST['camera'])){
        $camera = implode(",",$_POST['camera']);
        $select_sql .=" AND camera IN(".$camera.")";
        
    }
    $result = $con->query($select_sql);
    $output = '';
    if($result !== false && $result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output .= '<div class="col-sm-12 col-md-6 col-lg-3 mb-4">
            <div class="item py-2" style="width:250px;">
                <div class="product font-rale">
                    <a href="product.php?product_id='.$row['id'].'"><img src="./assets/products/'.$row['image'].'" alt="" class="img-fluid mx-auto d-flex" style="height:200px; width:auto;object-fit:cover;"></a>
                    <div class="text-center">
                    <h5>'.$row['product_name'].'</h5>
                    <h8>By '.$row['brand'].'</h8>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div><h9>('.$row['number_of_rating'].' ratings)</h9></div>
                        <div class="price py-2">
                            <span>RS.'.$row['product_price'].'</span>
                        </div>
                        <form method="POST">
                            <input type="hidden" name="product_id" value = "'.$row['id'].'">';
                            
                            if(in_array($row['id'],$Cart->getCartId($product->getCartData($_SESSION['id']))??[])){
                                $output.= '<input type="submit"  class="btn btn-success font-size-12" value = "In the Cart">';
                             }else{
                                $output.= '<button type="submit" name = "mobile_submit" class="btn btn-danger font-size-12"><i class="fa-solid fa-cart-plus"></i>&nbsp;<b>Add to Cart</b></button>';
                             }
                             $output.='
                        </form>
                    </div>
                </div>
            </div>
        </div>';
        }
    }
    else{
        $output = "<h3>No Products Found!</h3>";
    }
    echo $output;
    
}

?>