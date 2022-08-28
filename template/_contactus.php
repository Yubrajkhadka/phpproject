<?php require 'databaseconfig.php';

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $insert_sql = "INSERT INTO contact_table(name,email,message) values('$name','$email','$message')";

        $result = $con->query($insert_sql);

        if($result){ ?>

           <script type="text/javascript">alert("Message sent successfully");</script>
        <?php }
        else{?>
            <script type="text/javascript"> alert("Message sent failed");</script>

        <?php }
        
    }
?>

<div class="container mt-5 ml-5">
    <form class="align-items-center" method="POST">
    <h1 class="text-center">Reach us using form below</h1>
        <div class="form-group row mb-3">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name:</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg" required>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email:</label>
            <div class="col-sm-8">
                <input type="email" name="email" class="form-control form-control-lg" id="colFormLabelLg" required>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="message" class="col-sm-2 col-form-label col-form-label-lg">Message:</label>
            <div class="col-sm-8">
                <textarea name = "message" class="form-control form-control-lg" id="colFormLabelLg" required></textarea>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg"></label>
            <div class="col-sm-8 text-center">
                <input type="submit" name="send" value="Send Message" class="btn btn-danger px-5">
            </div>
        </div>
    </form>
</div>