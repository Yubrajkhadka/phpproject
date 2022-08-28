<?php 

require 'databaseconfig.php';

$selectsql = "SELECT * FROM product_table";

$result = $con->query($selectsql);
?>

<div class="listed-mobiles">
                        <div class="card">
                            <div class="card-header">
                                <h3>Listed Mobiles</h3>
                            </div>
                            <div class="card-body">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Mobile Name</td>
                                            <td>Brand</td>
                                            <td>Price</td>
                                            <td>RAM</td>
                                            <td>Launch Year</td>
                                            <td>Stock</td>
                                            <td>Action</td>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i=1;
                                        while($row = $result->fetch_assoc()) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['product_name'];?></td>
                                            <td><?php echo $row['brand'];?></td>
                                            <td><?php echo $row['product_price'];?></td>
                                            <td><?php echo $row['ram'];?></td>
                                            <td><?php echo $row['launch_year'];?></td>
                                            <td><?php echo $row['stock'];?></td>
                                            <td class="action">
                                            <a class="btn" href="./editmobile.php?product_id=<?php echo $row['id'];?>"><span><i class="far fa-edit"></i></span></a>
                                            <?php echo '<a class="btn btn-default" href="./templates/_deletemobile.php?id='.$row['id'].'" title = "Delete Mobile "><i class="far fa-trash-alt"></i></a>';?>
                                            <a class= "btn" href="./_viewmobile.php?product_id=<?php echo $row['id'];?>"><span><i class="far fa-eye"></i></span></a>
                                            </td>
                                            
                                        </tr>
                                    <?php 
                                    $i++;
                                } ?>    
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                     </div>  
                     <?php
                        $con->close();
                     ?>