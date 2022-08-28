<?php

require 'databaseconfig.php';

$selectsql = "SELECT * FROM contact_table";

$result = $con->query($selectsql);



?>

<div class="manage-contact">
                        <div class="card">
                            <div class="card-header">
                                <h3>Manage Contact Us Query</h3>
                            </div>
    
                            <div class="card-body">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Message</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $i = 1;
                                    while ($row = $result->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['message'];?></td>
                                            <td class="action">
                                                <a class="btn" href="">View</a>
                                                <a class="btn" href="">Response</a>
                                            </td>
                                        </tr>
                                       <?php 
                                        $i++;
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div> 

                     <?php
                        $con->close();
                     ?>