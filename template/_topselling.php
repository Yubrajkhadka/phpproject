<!-- Start Top Selling -->
<?php
    $product_shuffle = $product->getTopSelling();
    shuffle($product_shuffle);

    //request method post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //call method add to cart
        if(isset($_POST['top_sale_submit'])){
            $cart->addToCart($_SESSION['id'], $_POST['product_id']);
        }
    }
?>


<section id="top-selling">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Selling</h4>
        <hr>
        <!-- Start Owl Carousel  -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item){
                $id=$item['id']; ?>
                <div class="item py-1">
                    <div class="product font-rale">
                        <a href="product.php?product_id=<?php echo $item['id'];?>"><img src="./assets/products/<?php echo $item['image'];?>" alt="" class="img-fluid mx-auto d-block" style="height:200px; width:auto;object-fit:cover;"></a>
                        <div class="text-center">
                            <h6><?php echo $item['product_name']??"Unknown";?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>RS.<?php echo $item['product_price']??"0";?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="product_id" value = "<?php echo $item['id'];?>">
                                <?php
                                    if(in_array($item['id'],$Cart->getCartId($product->getCartData($_SESSION['id']))??[])){
                                         echo '<input type="submit"  class="btn btn-success font-size-12" value = "In the Cart">';
                                     }else{
                                         echo '<button type="submit" name = "top_sale_submit" class="btn btn-danger font-size-12"><i class="fa-solid fa-cart-plus"></i>&nbsp;<b>Add to Cart</b></button>';
                                     }
                                ?> 

                                </form>                        
                        </div>
                    </div>
                </div>
            <?php 
        }?>
        </div>

        <!-- End Owl Carousel -->
    </div>

</section>
<!-- End Top Selling -->