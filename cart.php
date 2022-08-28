<?php 
ob_start();
//include header.php file
include('header.php');

//include cart items if not empty
count($product->getCartData($_SESSION['id'])) ? include('template/_carttemplate.php') : include('template/notFound/_cartNotFound.php');

//include wishlist if not empty
count($product->getCartData($_SESSION['id'],"wishlist_table")) ? include('template/_wishlisttemplate.php') : include('template/notFound/_wishlistNotFound.php');

//include new phones area
include('template/_newphones.php');

//include footer.php file
include('footer.php');
?>