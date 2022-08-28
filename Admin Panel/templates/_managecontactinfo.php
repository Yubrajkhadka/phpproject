<?php 

require 'databaseconfig.php';

if (isset($_POST['update'])){
    
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $updatesql = "INSERT INTO contact_info(id,email,address,contact) VALUES(1,'$email','$address','$contact') ON DUPLICATE KEY UPDATE email = '$email', address = '$address', contact = '$contact'";

    $result = $con->query($updatesql);

    if($result){
        echo '<script> alert("Contact information updated Successfully"); history.back();</script>';
     
     }
     else{
        echo '<script> alert("Failed to update contact information");</script>';
     }
}
    

?>

<div class="update-contact-info">
                <div class="card">
                   
                    <h3>Update Contact Info</h3>
                    
                    <form method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="email"><h4>Email Id:</h4></label>
                                </td>
                                <td>
                                    <input class="form-control" type="email" name="email" required>  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="address"><h4>Address:</h4></label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="address" required>  
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label for="contact"><h4>Contact Number:</h4></label>
                            
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="contact" required>   
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    
                                    <input  type="submit" class="btn btn-primary" name = "update" value="Update"></button>
                                    
                                </td>
                            </tr>
                        </table>
                        
                        
                    </form>
                </div>
            </div> 
                     
        </div>
    </main>
</div>