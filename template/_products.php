<!-- Start Product -->
<?php
    ob_start();
    $product_id = $_GET['product_id']??1;
    foreach($product->getData() as $item):
        if($item['id']==$product_id):
    
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //call method add to cart
                if(isset($_POST['addtocart'])){
                    $cart->addToCart($_SESSION['id'], $_POST['product_id']);
                }
            } 

?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img id="product_image" src="./assets/products/<?php echo $item['image'];?>" alt="product" class="img-fluid mx-auto d-flex" style="height:400px; width:auto;object-fit:cover;">
                <div class="row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <a href="./template/_payment.php" class="btn btn-danger form-control">Proceed to Buy</a>
                    </div>
                    <div class="col">
                    <form method="POST">
                                <input type="hidden" name="product_id" value = "<?php echo $item['id'];?>">
                                <?php
                                if(in_array($item['id'],$Cart->getCartId($product->getCartData($_SESSION['id']))??[])){
                                     echo '<input type="submit"  class="btn btn-success form-control" value = "In the Cart">';
                                 }else{
                                     echo '<input type="submit" name = "addtocart" class="btn btn-warning form-control" value = "Add to Cart">';
                                 }
                            ?>  
                            </form>                     
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h5 class="font-baloo font-size-20"><?php echo $item['product_name'];?></h5>
                <small>by <?php echo $item['brand'];?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <span class="px-2 font-rale font-size-14">&nbsp;(<?php echo $item['number_of_rating']?>ratings)</span>
                </div>
                <hr class="m-0">
                <!-- Start product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>Rs.<span><?php echo $item['product_price'];?></span></strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Selling Price:</td>
                        <td class="font-size-20 text-danger">Rs.<span><?php echo $item['discounted_price'];?></span><small class="text-dark font-size-12">&nbsp;&nbsp;(inclusive of all taxes.)</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <?php
                        $actual_price = $item['product_price'];
                        $discounted_price = $item['discounted_price'];
                        $saving = $actual_price - $discounted_price;?>
                        <td class="font-size-16 text-danger">Rs.<span><?php echo $saving;?></span></td>
                    </tr>
                </table>
                <!-- End Product Price -->


                <!--Start policy -->
                <div class="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 days<br />replacement</a>
                        </div>
                        <div class="return text-center mr-5 px-4">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Free<br />Delivery</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 year<br />Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- End Policy -->

                <hr>

                <!--Start Order Details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                <?php
                    $initial_date = date("d M",time()+7*86400);
                    $final_date = date("d M", time()+10*86400);
                ?>    
                <small>Delivery By: <?php echo $initial_date."-".$final_date;?></small>
                </div>
                <!-- End Order Details -->

                <div class="row">
                    <div class="col-6">
                        <!-- Start Color  -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color Options:</h6>
                                <?php echo $item['color'];?>
                            </div>
                        </div>
                        <!-- End Color  -->
                    </div>
                    
                </div>
                <!-- Variants -->
                <div class="size my-3">
                    <h6 class="font-baloo">Variants:</h6>
                    <div class="d-flex justify-content-between w-75">
                        <h6>RAM:</h6>
                        <p><?php echo $item['ram'];?>GB</p>
                        <h6>ROM:</h6>
                        <p><?php echo $item['hdd'];?>GB</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h4 class="font-rubik">Product Specification</h4>
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col">Name:</td>
                            <td scope="col"><?php echo $item['product_name'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Brand:</td>
                            <td scope="col"><?php echo $item['brand'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">RAM:</td>
                            <td scope="col"><?php echo $item['ram'];?>GB</td>
                        </tr>
                        <tr>
                            <td scope="col">Internal Storage::</td>
                            <td scope="col"><?php echo $item['hdd'];?>GB</td>
                        </tr>
                        <tr>
                            <td scope="col">Processor:</td>
                            <td scope="col"><?php echo $item['processor'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Display size:</td>
                            <td scope="col"><?php echo $item['screen_size'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Display type:</td>
                            <td scope="col"><?php echo $item['display_discription'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Battery</td>
                            <td scope="col"><?php echo $item['battery'];?>mah</td>
                        </tr>
                        <tr>
                            <td scope="col">Launch year:</td>
                            <td scope="col"><?php echo $item['launch_year'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Front Camera</td>
                            <td scope="col"><?php echo $item['front_camera'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Back Camera:</td>
                            <td scope="col"><?php echo $item['camera'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Operating System:</td>
                            <td scope="col"><?php echo $item['os'];?></td>
                        </tr>
                        <tr>
                            <td scope="col">Sensors</td>
                            <td scope="col"><?php 
                            if($item['fingerprint'])
                                echo "fingerprint sensor,<br>";
                            if($item['gyro'])
                                echo "gyro sensor,<br>";
                            if($item['proximity'])
                                echo "proximity sensor,<br>";
                            if($item['accelemetter'])
                                echo "accelerometer sensor,<br>";
                            if($item['lidar'])
                                echo "lidar sensor,<br>";
                            if($item['magnetometer'])
                                echo "magnetometer sensor,<br>";
                            if($item['gprs'])
                                echo "gprs sensor<br>";
                            ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- End Product -->

<?php 
endif;
endforeach; ?>