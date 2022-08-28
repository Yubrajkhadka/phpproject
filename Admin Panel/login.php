<?php 

session_start();

require 'databaseconfig.php';

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = $_POST['password'];

    if($user == "admin" && $password == "admin"){
      header("location:admin.php");
    }
    else{
      echo '<script> alert("incorrect username and password");</script>';
    }
      
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <style type="text/css">

      *{

        padding:0;
        margin:0;
        box-sizing: border-box;
      }
      body{

        background: rgb(219,226,226);
      }

      .row{
        background:white;
        border-radius: 30px;
      }

      img{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
      }
      .btn-login{

        border:none;
        outline:none;
        height:50px;
        width:100%;
        background : rgb(0, 204, 204);
        color:white;
        font-weight: bold;


      }
      .btn-login:hover{
        background:white;
        border: 1px solid;
        color:black;
      }
    </style>
  </head>
  <body>
    
    <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./images/admin.jpg" class="img-fluid" alt="Login">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">
              Online Mobile Shop
            </h1>
            <h4>Admin Login</h4>
            <form method="POST">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Username/Email" class="form-control my-3 p-2" name="user" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="******" class="form-control my-3 p-2" name="password" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="submit" class="btn-login mt-3 mb-5" value = "Login" name="login">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>