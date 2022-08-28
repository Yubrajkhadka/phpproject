<?php

    require 'databaseconfig.php';

    $mobileselect =  "SELECT * FROM product_table";
    $mobile = $con->query($mobileselect);
    $m = mysqli_num_rows($mobile);
    
    $orderselect = "SELECT * FROM order_table";
    $order = $con->query($orderselect);
    $o = mysqli_num_rows($order);

    $userselect = "SELECT * FROM users_table";
    $users = $con->query($userselect);
    $u = mysqli_num_rows($users);

    $brandselect = "SELECT * FROM brand";
    $brands = $con->query($brandselect);
    $b = mysqli_num_rows($brands);
?>

<main>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1><?php echo $u;?></h1>
                <span>Registered Users</span>
            </div>
            <div>
                <span class="icon"><i class="fas fa-users"></i></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1><?php echo $m;?></h1>
                <span>Listed Mobiles</span>
            </div>
            <div>
                <span class="icon"><i class="fas fa-mobile-alt"></i></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1><?php echo  $o;?></h1>
                <span>Total Orders</span>
            </div>
            <div>
                <span class="icon"><i class="fas fa-th-list"></i></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1><?php echo $b;?></h1>
                <span>Brands</span>
            </div>
            <div>
                <span class="icon"><i class="fas fa-copy"></i></span>
            </div>
        </div>
        
    </div>
    <?php
        $con->close();
    ?>