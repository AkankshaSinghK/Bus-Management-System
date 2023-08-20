<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
//echo "registered";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($username=="" || $firstname=="" || $lastname=="" || $email=="" || $phone_no=="" || $image=="" || $password=="") {
  # code...
  echo "**ALL FIELDS MANDATORY";
}
elseif (strlen($phone_no)!=10) {
  # code...
  echo "**PhoneNo Must Contain Of 10 bits";
}

else {

$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: index.php");

}

}

?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->
 
    <div class="container" style="background-color:#CEE9B6; width: 1500px;">
        <div class="row" style="background-color:#CEE9B6;">
            <div class="col-lg-6" style="background-color:#CEE9B6;">
                <img src="images/bus_regis.png" style="margin-top: 30%;">
            </div>
            <div class="col-lg-6"  >
                
            <div style="border: 5px solid black; margin:8px; padding: 8px; background-color: #F8D49A; width:500px;height:640px; border-radius:15px;">
              <h2 style=" color:#974063; text-align: center; font-size: 20px;font-weight:bold;">Registration</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="email">Username:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username" required>
                </div>

                <div class="form-group">
                  <label for="email">Firstname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Firstname" name="firstname" required>
                </div>

                <div class="form-group">
                  <label for="email">Lastname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Lastname" name="lastname" required>
                </div>

                <div class="form-group">
                    <label for="bus-image">UserImage</label>
                    <input type="file" name="image" >
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                
                <div class="form-group">
                  <label for="pwd">Phone No:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="phone_no" required>
                </div>

                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                </div>
        
                <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">Register</button>
              </form>
            

            </div>
        </div>

    </div>
</div>
        <hr>

<?php include "includes/footer.php"; ?>