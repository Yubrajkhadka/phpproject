<?php 
    require 'databaseconfig.php';

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['pass'];
        $rpass = $_POST['rpass'];
        if($password != $rpass){

            echo "password mismatch";
        }
        $select_user = "SELECT email FROM users_table WHERE email ='$email'";

        $result = $con->query($select_user);
        if(!$result){
            echo '<script> alert("user already exists")</script>';
        }else{
            $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
            $insert_user = "INSERT INTO users_table(name,address,email,contact,password) VALUES ('$name','$address','$email','$contact','$hashedpwd')";
            $insert_result = $con->query($insert_user);
            if(!$insert_result){
                echo '<script> alert("registrstion failed");</script>';
            }
            else{
                echo '<script>alert("registrstion successful")</script>';
                header("Location:login.php");
            }
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
          <div class="col-lg-5 pt-5">
            <img src="./assets/banners/register.jpg" class="img-fluid" alt="Register">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">
              Online Mobile Shop
            </h1>
            <h4>Create your account</h4>
            <form method="POST">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Full Name " class="form-control my-3 p-2" name="name" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Address" class="form-control my-3 p-2" name = "address" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="email" placeholder="Email Address" class="form-control my-3 p-2" name="email" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Contact Number" class="form-control my-3 p-2" name="contact" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="Password" class="form-control my-3 p-2" name="pass" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="Confirm Password" class="form-control my-3 p-2" name="rpass" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="submit" class="btn-login mt-3 mb-5" value = "Register" name="register">
                </div>
              </div>
              <p>
                Already have an account ? <a style = "text-decoration:none;" href="login.php">Login Here !</a>
              </p>
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