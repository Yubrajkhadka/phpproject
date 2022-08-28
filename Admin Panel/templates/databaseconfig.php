<?php 

$con = new mysqli("localhost","root","","onlinemobileshop");

if($con->connect_error){
    die("connection failed!".$con->connect_error);
}
?>