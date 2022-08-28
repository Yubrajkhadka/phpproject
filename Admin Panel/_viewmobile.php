<?php

require 'databaseconfig.php';

include('./templates/_header.php');

$product_id = $_GET['product_id'];

$select_sql = "SELECT * FROM product_table WHERE id = $product_id";


$result = $con->query($select_sql);

$product = mysqli_fetch_array($result);
?>

<div class="container">
    <div class="card">

        <h3 class="text-center">View Mobile Details</h3>


        
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label for="name">
                            <h4>Name:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['product_name']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">
                            <h4>Market Price(RS.):</h4>
                        </label>
                    </td>
                    <td>
                    <h4><?php echo $product['product_price']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">
                            <h4>Selling Price(RS.):</h4>
                        </label>
                    </td>
                    <td>
                    <h4><?php echo $product['discounted_price']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="brand">
                            <h4>Brand:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['brand']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="launchyear">
                            <h4>Launch Year:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['launch_year']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ram">
                            <h4>RAM(GB):</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['ram']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="rom">
                            <h4>ROM(GB):</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['hdd']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="processor">
                            <h4>Processor:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['processor']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="screensize">
                            <h4>Screen Size:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['screen_size']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="backcamera">
                            <h4>Back Camera(MP):</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['camera']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="frontcamera">
                            <h4>Front Camera(MP):</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['front_camera']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="os">
                            <h4>OS:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['os']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="battery">
                            <h4>Battery(mah):</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['battery']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="display_description">
                            <h4>Display Discription:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['display_discription']; ?></h4>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="color">
                            <h4>Color:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['color']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="stock">
                            <h4>Stock:</h4>
                        </label>
                    </td>
                    <td>
                        <h4><?php echo $product['stock']; ?></h4>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="sensors">
                            <h4>Sensors:</h4>
                        </label>
                    </td>
                    <td>
                    <?php 
                            if($product['fingerprint'])
                                echo "<h5>fingerprint sensor,<br>";
                            if($product['gyro'])
                                echo "gyro sensor,<br>";
                            if($product['proximity'])
                                echo "proximity sensor,<br>";
                            if($product['accelemetter'])
                                echo "accelerometer sensor,<br>";
                            if($product['lidar'])
                                echo "lidar sensor,<br>";
                            if($product['magnetometer'])
                                echo "magnetometer sensor,<br>";
                            if($product['gprs'])
                                echo "gprs sensor</h5><br>";
                            ?>
                    </td>
                </tr>
                
            </table>
        </form>
    </div>