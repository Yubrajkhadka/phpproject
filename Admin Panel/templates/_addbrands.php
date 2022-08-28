<?php

    require 'databaseconfig.php';

    if(isset($_POST['createbrand'])){

        $brandname = $_POST['brandname'];

        $insertsql = "INSERT INTO brand(brand_name) SELECT '$brandname' WHERE NOT EXISTS (SELECT brand_name FROM brand WHERE brand_name = '$brandname') LIMIT 1";

        $result = $con->query($insertsql);
        if($result){
            echo '<script> alert("Brand added Successfully"); history.back();</script>';
            
        }
        else{
            echo '<script> alert("Failed to add brand");</script>';
        }

    }
    $con->close();
?>

<div class="recent-grid">
                    <div class="add-brand">
                        <div class="card">
                            
                            <h3>Create Brand</h3>
                            <br/>
                            <form method = "POST">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="brandname"><h4>New Brand Name:</h4></label>
                                        </td>
                                        <td>
                                            <input class = "form-control" type="text" name="brandname" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" name="createbrand" class="btn btn-primary text-center" value = "Create Brand">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>