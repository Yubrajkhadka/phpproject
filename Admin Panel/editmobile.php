<?php

require 'databaseconfig.php';

include('./templates/_header.php');

$product_id = $_GET['product_id'];

$select_sql = "SELECT * FROM product_table WHERE id = '$product_id'";

$result = $con->query($select_sql);

$product = mysqli_fetch_array($result);


if(isset($_POST['updatemobile'])){

    $name = $_POST['name'];
    $m_price = $_POST['m_price'];
    $s_price = $_POST['s_price'];
    $brand = $_POST['brand'];
    $launchyear = $_POST['launchyear'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $processor = $_POST['processor'];
    $screensize = $_POST['screensize'];
    $backcamera = $_POST['backcamera'];
    $frontcamera = $_POST['frontcamera'];
    $os= $_POST['os'];
    $battery = $_POST['battery'];
    $display_description = $_POST['display_description'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $fingerprint = (isset($_POST['fingerprint']) ? 1 : 0);
    $proximity = (isset($_POST['proximity']) ? 1 : 0);
    $gyro = (isset($_POST['gyro']) ? 1 : 0);
    $accelerometer = (isset($_POST['accelerometer']) ? 1 : 0);
    $lidar = (isset($_POST['lidar']) ? 1 : 0);
    $magnetometer = (isset($_POST['magnetometer']) ? 1 : 0);
    $gprs = (isset($_POST['gprs']) ? 1 : 0);
   
    //image processing
    //check if the image is selected or not and set values for image
    
    if(isset($_FILES['image']['name'])){
        //upload image
        //get image name 
        $image_name = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];
        $dest_path = "../assets/products/".$image_name;

        //upload the image
        $upload = move_uploaded_file($source_path, $dest_path);
        
        //check if the image is uploaded or not
        if($upload == false){
            echo "failed to upload the image";
            die();//stop process
        }
        
    }
    else{
        //don't upload image
        $image_name = "";
    }

    $update_sql = "UPDATE product_table SET product_name = '$name',product_price = '$m_price',discounted_price = '$s_price', brand = '$brand',launch_year = '$launchyear',ram = '$ram',hdd = '$rom',processor = '$processor',screen_size = '$screensize',camera = '$backcamera',front_camera = '$frontcamera',os = '$os',battery = '$battery',display_discription = '$display_description',color = '$color',stock = '$stock',fingerprint = '$fingerprint',proximity = '$proximity',gyro = '$gyro',accelemetter = '$accelerometer',lidar = '$lidar',magnetometer = '$magnetometer',gprs = '$gprs' , image = '$image_name' WHERE id = {$product_id}";
                
    $result = $con->query($update_sql);
    if(!$result){
        echo '<script> alert("failed to add product") </script>';
    
    }
    else{
        echo '<script>("product added successfully")</script>';
    }

    

        
    
    

}
?>

<div class="add-mobile">
    <div class="card">

        <h3>Edit Mobile Details</h3>



        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label for="name">
                            <h4>Name:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="name" value="<?php echo $product['product_name']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">
                            <h4>Market Price(RS.):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="m_price" value="<?php echo $product['product_price']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">
                            <h4>Selling Price(RS.):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="s_price" value="<?php echo $product['discounted_price']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="brand">
                            <h4>Select Brand*</h4>
                        </label>
                    </td>
                    <td>
                        <select class="form-control" name="brand" required>
                            <option value="<?php echo $product['brand']; ?>" selected="selected"><?php echo $product['brand'];?></option>
                            <?php
                            $select_brand = "SELECT brand_name FROM brand ORDER BY brand_name";
                            $result = $con->query($select_brand);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['brand_name']; ?>"><?php echo $row['brand_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="launchyear">
                            <h4>Launch Year:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="date" name="launchyear" value="<?php echo $product['launch_year']; ?>"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ram">
                            <h4>RAM(GB):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="ram" value="<?php echo $product['ram']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="rom">
                            <h4>ROM(GB):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="rom" value="<?php echo $product['hdd']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="processor">
                            <h4>Processor:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="processor" value="<?php echo $product['processor'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="screensize">
                            <h4>Screen Size:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="screensize" value="<?php echo $product['screen_size']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="backcamera">
                            <h4>Back Camera(MP):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="backcamera" value="<?php echo $product['camera'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="frontcamera">
                            <h4>Front Camera(MP):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="frontcamera" value="<?php echo $product['front_camera'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="os">
                            <h4>OS:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="os" value="<?php echo $product['os']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="battery">
                            <h4>Battery(mah):</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="battery" value="<?php echo $product['battery'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="display_description">
                            <h4>Display Discription:</h4>
                        </label>
                    </td>
                    <td>
                        <textarea class="form-control" name="display_description"  required><?php echo $product['display_discription']; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="color">
                            <h4>Color:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="color" value="<?php echo $product['color']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="stock">
                            <h4>Stock:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="stock" value="<?php echo $product['stock']; ?>"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">
                            <h4>Upload Image:</h4>
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="file" name="image" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sensors">
                            <h4>Sensors:</h4>
                        </label>
                    </td>
                    <td>
                        <input type="checkbox" name="fingerprint" value="1" <?php echo (isset($product['fingerprint']) ? 'checked="checked"' : '') ?>>
                        <label for="fingerprint"> Fingerprint Sensor</label>
                        <input type="checkbox" name="proximity" value="1" <?php echo (isset($product['proximity']) ? 'checked="checked"' : '') ?>>
                        <label for="proximity"> Proximity Sensor</label>
                        <input type="checkbox" name="gyro" value="1" <?php echo (isset($product['gyro']) ? 'checked="checked"' : '') ?>>
                        <label for="gyro"> Gyroscope Sensor</label>
                        <input type="checkbox" name="accelerometer" value="1" <?php echo (isset($product['accelerometer']) ? 'checked="checked"' : '') ?>>
                        <label for="accelerometer"> Accelerometer Sensor</label>
                        <input type="checkbox" name="lidar" value="1" <?php echo (isset($product['lidar']) ? 'checked="checked"' : '') ?>>
                        <label for="lidar"> Lidar Sensor</label>
                        <input type="checkbox" name="magnetometer" value="1" <?php echo (isset($product['magnetometer']) ? 'checked="checked"' : '') ?>>
                        <label for="magnetometer"> Magentometer Sensor</label>
                        <input type="checkbox" name="gprs" value="1" <?php echo (isset($product['gprs']) ? 'checked="checked"' : '') ?>>
                        <label for="gprs"> GPRS Sensor</label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="updatemobile" class="btn btn-primary text-center" value="Update Mobile Details">
                    </td>
                </tr>
            </table>
        </form>
    </div>