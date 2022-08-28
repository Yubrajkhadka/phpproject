<!-- Start Shopping Cart Section -->
<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        if(isset($_POST['deleteCartItem'])){
        
                $deletedRecord = $cart->deleteCartItem($_POST['item_id'] , $_SESSION['id']);

        }
        //save product
        if(isset($_POST['save'])){
            $cart->saveProduct($_SESSION['id']??0,$_POST['item_id']);
        }
    }
?>

<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>
                <!-- Start Shopping Cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            
                            foreach($product->getCartData($_SESSION['id']) as $item):
                                $cart= $product->getProduct($item['product_id']);
                                $subTotal[] = array_map(function($item){
                        ?>
                        <!-- Start Cart Items     -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="./assets/products/<?php echo $item['image'];?>" style="height:120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                            <h5 class="font-baloo font-size-20"><?php echo $item['product_name']?></h5>
                            <small>By <?php echo $item['brand'];?></small>
                            <!-- Start User Rating -->
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="" class="px-2 font-rale font-size-14"><?php echo $item['number_of_rating'];?> Ratings</a>
                            </div>
                            <!-- End User Rating -->

                            <!-- Start Product Quantity -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex font-rale w-25">
                                    <button class="qty-down bg-light" data-id="<?php echo $item['id'];?>">
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                    <input type="text" data-id="<?php echo $item['id'];?>" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                    <button data-id="<?php echo $item['id'];?>" class="qty-up bg-light">
                                        <i class="fas fa-angle-up"></i>
                                    </button>
                                </div>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']?? 0;?>">
                                    <input type="submit" class="btn font-baloo text-danger px-3 border-right" name = "deleteCartItem" value="Delete">
                                </form><form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']?? 0;?>">
                                    <input type="submit" class="btn font-baloo text-danger" name="save" value="Save">
                                </form>
                            </div>
                            <!-- End Product Quantity -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 font-baloo text-danger">
                                    Rs:<span class="product-price" data-id="<?php echo $item['id'];?>"><?php echo $item['discounted_price'];?></span>
                                </div>
                            </div>
                        </div>
                        <!-- End Cart Items     -->
                        <?php
                            return $item['discounted_price'];
                        },$cart);//clossing array map function
                        endforeach;
                        
                        ?>
                    </div>
                    <!-- Start Sub total -->
                    <div class="col-sm-3">
                        <div class="sub-total border text-center mt-2">
                            <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i>Your Order is eligible for free Delivery</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-16">Subtotal(<?php echo count($product->getCartData($_SESSION['id']));?> items);&nbsp;<span class="text-danger">Rs.<span class="text-danger" id="deal-price"><?php echo isset($subTotal)?$Cart->getSum($subTotal): 0; ?></span></span></h5>
                                <a href="./template/_payment.php" class="btn btn-warning mt-3">Proceed to Buy</a>
                            
                            </div>
                        </div>
                    </div>
                    <!-- End Sub total -->
                </div>
                <!-- End Shopping Cart items -->
            </div>
        </section>        
        <!-- End Shopping Cart Section -->
        