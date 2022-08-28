<?php

require 'databaseconfig.php';

$selectsql = "SELECT * FROM brand";

$result = $con->query($selectsql);



?>

<div class="manage-brands">
    <div class="card">
        <div class="card-header">
            <h3>Manage Brands</h3>
        </div>
        <div class="card-body">
            <table width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Brand Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i =1;
                    while ($row = $result->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['brand_name'];?></td>
                        <td class="action">
                            <?php echo '<a class="btn btn-danger" href="./templates/_deletebrand.php?id='.$row['id'].'" title = "Delete Brand "><i class="far fa-trash-alt"></i>&nbsp;Delete</a>';?>
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