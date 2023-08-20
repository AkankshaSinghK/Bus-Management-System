<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper" style="background-color:#CEE9B6;width:1150px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row"  style="border:2px solid #FE8C8C;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>


                        <h2 style="text-align:center;">Users List</h2>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'update_user':
                                include "includes/update_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover" style="border:2px solid #FE8C8C;"> 
                                <thead style="border:2px solid #FE8C8C;">
                                    <tr>
                                        <th style="border:2px solid #FE8C8C;">Id</th>
                                        <th style="border:2px solid #FE8C8C;">UserName</th>
                                        <th style="border:2px solid #FE8C8C;">Firstname</th>
                                        <th style="border:2px solid #FE8C8C;">Lastname</th>
                                        <th style="border:2px solid #FE8C8C;">Image</th>
                                        <th style="border:2px solid #FE8C8C;">Email</th>
                                        <th style="border:2px solid #FE8C8C;">Phone No.</th>
                                        <th style="border:2px solid #FE8C8C;">Role</th>
                                        <th style="border:2px solid #FE8C8C;">Action</th>
                                        <th style="border:2px solid #FE8C8C;">Action</th>
                                        <th style="border:2px solid #FE8C8C;">Action</th>
                                        <th style="border:2px solid #FE8C8C;">Action</th>
                                       
                                </thead>

                                <tbody style="border:2px solid #FE8C8C;">
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $user_firstname = $row['user_firstname'];
                                            $user_lastname = $row['user_lastname'];
                                            $user_email = $row['user_email'];
                                            $user_role = $row['user_role'];
                                            $user_phoneno = $row['user_phoneno'];  
                                            $user_image = $row['user_image'];                                      

                                     ?>
                                    <tr style="border:2px solid #FE8C8C;">
                                        <td style="border:2px solid #FE8C8C;" ><?php echo $user_id ?></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $username ?></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $user_firstname ?></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $user_lastname ?></td>
                                        <td style="border:2px solid #FE8C8C;"><img width="100" src="images/<?php echo $user_image ?>"></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $user_email ?></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $user_phoneno ?></td>
                                        <td style="border:2px solid #FE8C8C;"><?php echo $user_role ?></td>
                                        
                                        <?php echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?source=update_user&user_id=$user_id'>Edit</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?make_admin=$user_id'>Make Admin</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?remove_from_admin=$user_id'>Remove From Admin</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        // if ($source = 'add_bus') {
                        //        include "includes/add_bus.php";   
                        // }
                        // elseif ($source = '') {
                        //     
                        // }   
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $user_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM users WHERE user_id = {$user_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location : users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['make_admin'])) {
                            $user_id = $_GET['make_admin'];
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['remove_from_admin'])) {
                            $user_id = $_GET['remove_from_admin'];
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>