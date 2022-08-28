<?php

 //require mysql connection
 require('../database/DBController.php');


 //require Product Class
 require('../database/fetchproduct.php');

 //DBController object
 $db = new DBController();

 //product oblect
 $product = new Product($db);

 if(isset($_POST['product_name'])){
     $product_name = $_POST['product_name'];
     $result = $product->db->con->query(query:"SELECT * FROM product_table WHERE product_name != '$product_name' ORDER BY product_name ");
     print_r($result);
    ?>
        <select name="product2" class="product2 form-control">
            <option >Select product</option>
        <?php
            while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['product_name'];?>"><?php echo $row['product_name'];?></option>
                <?php
            }
        ?>
        </select>
    <?php

 }
?>