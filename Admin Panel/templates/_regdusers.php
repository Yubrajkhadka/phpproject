<?php 

require 'databaseconfig.php';

$selectsql = "SELECT * FROM users_table";

$result = $con->query($selectsql);
?>



<div class="regd-users">
                        <div class="card">
                            <div class="card-header">
                                <h3>Registered Users</h3>
                            </div>
    
                            <div class="card-body">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Contact no</td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        while($row = $result->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['contact'];?></td>
                                            
                                        </tr>
                                        <?php $i++;
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php
                        $con->close();
                    ?>