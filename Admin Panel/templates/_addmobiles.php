<?php

    require 'databaseconfig.php';

    if(isset($_POST['addmobile'])){

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

        $insert_sql = "INSERT INTO product_table(product_name,product_price,discounted_price,brand,launch_year,ram,hdd,processor,screen_size,camera,front_camera,os,battery,display_discription,color,stock,fingerprint,proximity,gyro,accelemetter,lidar,magnetometer,gprs,image) 
                       VALUES('$name','$m_price','$s_price','$brand','$launchyear','$ram','$rom','$processor','$screensize','$backcamera','$frontcamera','$os','$battery','$display_description','$color','$stock','$fingerprint','$proximity','$gyro','$accelerometer','$lidar','$magnetometer','$gprs','$image_name')";
                    
        $result = $con->query($insert_sql);
        if($result){
            echo '<script> alert("Product added Successfully"); history.back();</script>';
            
        }
        else{
            echo '<script> alert("Failed to add product");</script>';
        }

        

            
        
        

    }
    
?>


<div class="add-mobile">
                        <div class="card">
                            
                            <h3>Add a Mobile</h3>
                            
                                       
                            
                            <form method = "POST" enctype="multipart/form-data" >
                                <table>
                                    <tr>
                                        <td>
                                            <label for="name"><h4>Name:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="name" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="price"><h4>Market Price(RS.):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="m_price" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="price"><h4>Selling Price(RS.):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="s_price" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="brand"><h4>Select Brand*</h4></label>
                                        </td>
                                        <td>
                                            <select class="form-control" name="brand" required>
                                            <?php
                                                $select_brand = "SELECT brand_name FROM brand ORDER BY brand_name";
                                                $result = $con->query($select_brand);
                                                while($row=$result->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $row['brand_name'];?>"><?php echo $row['brand_name'];?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="launchyear"><h4>Launch Year:</h4></label>   
                                        </td>
                                        <td>
                                            <input class="form-control" type="date" name="launchyear" required>  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="ram"><h4>RAM(GB):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="ram" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="rom"><h4>ROM(GB):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="rom" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="processor"><h4>Processor:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="processor" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="screensize"><h4>Screen Size:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="screensize" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="backcamera"><h4>Back Camera(MP):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="backcamera" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="frontcamera"><h4>Front Camera(MP):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="frontcamera" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="os"><h4>OS:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="os" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="battery"><h4>Battery(mah):</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="battery" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="display_description"><h4>Display Discription:</h4></label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="display_description" required></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="color"><h4>Color:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="color" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="stock"><h4>Stock:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="stock" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="image"><h4>Upload Image:</h4></label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="file" name="image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sensors"><h4>Sensors:</h4></label>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="fingerprint" value="1" <?php echo (isset($_POST['fingerprint']) ? 'checked="checked"' : '')?> >
                                            <label for="fingerprint"> Fingerprint Sensor</label>
                                            <input type="checkbox" name="proximity" value="1" <?php echo (isset($_POST['proximity']) ? 'checked="checked"' : '')?> >
                                            <label for="proximity"> Proximity Sensor</label>
                                            <input type="checkbox" name="gyro" value="1" <?php echo (isset($_POST['gyro']) ? 'checked="checked"' : '')?> >
                                            <label for="gyro"> Gyroscope Sensor</label>
                                            <input type="checkbox" name="accelerometer" value="1" <?php echo (isset($_POST['accelerometer']) ? 'checked="checked"' : '')?> >
                                            <label for="accelerometer"> Accelerometer Sensor</label>
                                            <input type="checkbox" name="lidar" value="1" <?php echo (isset($_POST['lidar']) ? 'checked="checked"' : '')?> >
                                            <label for="lidar"> Lidar Sensor</label>
                                            <input type="checkbox" name="magnetometer" value="1" <?php echo (isset($_POST['magnetometer']) ? 'checked="checked"' : '')?> >
                                            <label for="magnetometer"> Magentometer Sensor</label>
                                            <input type="checkbox" name="gprs" value="1" <?php echo (isset($_POST['gprs']) ? 'checked="checked"' : '')?> >
                                            <label for="gprs"> GPRS Sensor</label>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" name="addmobile" class="btn btn-primary text-center" value = "Add Mobile">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>