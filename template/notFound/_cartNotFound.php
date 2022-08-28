<!-- Start Shopping Cart Section -->

<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>
                <!-- Start Shopping Cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <!-- Start Empty cart  -->

                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-12 text-center py-2">
                                <img src="./assets/empty-cart.png" alt="Empty Cart" class="img-fluid" style="height:200px;">
                                <p class="font-baloo font-size-16 text-black">Empty Cart</p>
                            </div>
                        </div>

                        <!-- End Empty Cart -->
                    </div>
                    <!-- Start Sub total -->
                    <div class="col-sm-3">
                        <div class="sub-total border text-center mt-2">
                            <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i>Your Order is eligible for free Delivery</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-16">Subtotal(<?php echo count($product->getCartData($_SESSION['id']));?> items);&nbsp;<span class="text-danger">Rs.<span class="text-danger" id="deal-price"><?php echo isset($subTotal)?$Cart->getSum($subTotal): 0; ?></span></span></h5>
                                <button class="btn btn-warning mt-3">Proceed to Buy</button>
                            
                            </div>
                        </div>
                    </div>
                    <!-- End Sub total -->
                </div>
                <!-- End Shopping Cart items -->
            </div>
        </section>        
        <!-- End Shopping Cart Section -->