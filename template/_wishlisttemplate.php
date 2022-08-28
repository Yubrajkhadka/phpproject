<!-- Start Shopping Cart Section -->
<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        if(isset($_POST['deleteWishListItem'])){
        
                $deletedRecord = $Cart->deleteCartItem($_POST['item_id'] , $_SESSION['id'],"wishlist_table");

        }

        if(isset($_POST['cart_submit'])){

            $Cart->saveProduct($_SESSION['id']??0,$_POST['item_id'],"cart_table","wishlist_table");
        }
    }
      
    
?>

<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">WishList</h5>
                <!-- Start Shopping Cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            
                            foreach($product->getCartData($_SESSION['id'],"wishlist_table") as $item):
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

                            
                            <div class="qty d-flex pt-2">
                               
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']?? 0;?>">
                                    <input type="submit" class="btn font-baloo text-danger pl-0 pr-3 border-right" name = "deleteWishListItem" value="Delete">
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']?? 0;?>">
                                    <input type="submit" class="btn font-baloo text-danger" name="cart_submit" value="Add to Cart">
                                </form>
                            </div>
                            
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
                    
                </div>
                <!-- End Shopping Cart items -->
            </div>
        </section>        
        <!-- End Shopping Cart Section -->