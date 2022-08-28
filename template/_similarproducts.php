<!-- Start New Phones -->
<?php
    $product_shuffle = $product->getNewPhones();
    shuffle($product_shuffle);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //call method add to cart
        if(isset($_POST['newphone_submit'])){
            $Cart->addToCart($_SESSION['id'], $_POST['product_id']);
        }
    }
?>



<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">Similar Phones</h4>
        <hr>

        <!-- Start Owl Carousel  -->
        <div class="owl-carousel owl-theme">
        <?php
            foreach ($product_shuffle as $item) {?>
            <div class="item py-1 bg-light">
                <div class="product font-rale">
                    <a href="product.php?product_id=<?php echo $item['id'];?>"><img src="./assets/products/<?php echo $item['image'] ;?>" alt="" class="img-fluid mx-auto d-flex" style="height:200px; width:auto;object-fit:cover;"></a>
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
                                     echo '<button type="submit" name = "newphone_submit" class="btn btn-danger font-size-12" ><i class="fa-solid fa-cart-plus"></i>&nbsp;<b>Add to Cart</b></button>';
                                 }
                            ?>                         
                        </form>                     
                    </div>
                </div>
            </div>
            <?php } ?>
            

        </div>
    </div>
</section>
<!-- End New Phones -->