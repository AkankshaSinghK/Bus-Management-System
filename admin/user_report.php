<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper" style="background-color:#FFC9A5;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                        <br><br>
                        <h2>USER REPORT:</h2>
                        <br>
                        <?php

                        
                        $query = "SELECT *  FROM  orders";
                        $orders = mysqli_query($connection,$query);
                        ?>


                        <table class="table table-striped" style="width: 50%">
                          <tbody><tr>
                            <th>Booking ID</th>
                            <th>BUS ID</th>
                            <th> User ID</th>
                            <th>User Name</th>
                            <th>User Age</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Cost</th>
                            </tr>
                            <?php
                            if (mysqli_num_rows($orders) > 0){
                                while ($row = mysqli_fetch_array($orders)){
                                   echo "<tr><td>".$row['order_id']."</td>
                                   <td>".$row['bus_id']."</td>
                                   <td>".$row['user_id']."</td>
                                   <td>".$row['user_name']."</td>
                                   <td>".$row['user_age']."</td>
                                   <td>".$row['source']."</td>
                                   <td>".$row['destination']."</td>
                                   <td>".$row['date']."</td>
                                   <td>".$row['cost']."</td></tr>";
                                }
                            }
                            ?>    
                                
                                
                              
                          </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>