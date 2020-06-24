<?php include 'nav.php'; ?>

<form method="POST" action="signup.php" enctype="multipart/form-data">
  <div class="form">
    <div class="col-3">
      First Name : <input type="text" name="first_name" class="form-control" placeholder="First Name"><br/>
    </div>
    <div class="col-3">
      Last Name : <input type="text" name="last_name" class="form-control" placeholder="Last Name"><br/>
    </div>
    <div class="col-3">
      Email : <input type="email" name="email" class="form-control" placeholder="Email Address"><br/>
    </div>
    <div class="col-3">
      Password : <input type="password" name="password" class="form-control" placeholder="Password"><br/>
    </div>
    <div>
  	  <input type="file" name="avatar_image"><br/>
  	</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php
if(isset($_POST["submit"])) {
  $error = '';
  if(empty($_POST['email']) && empty($_POST['password'])){
    echo 'Please Enter Email and Password';
  } else {
    $image = $_FILES['avatar_image']['name'];
    $target = "images/".basename($image);

    $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `avatar_img`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$_POST['password']."', '".$image."')";
    // $sql = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `avatar_img`) VALUES (NULL, 'z', 'z', 'z', 'z', 'z')";

    if (move_uploaded_file($_FILES['avatar_image']['tmp_name'], $target)) {
      echo "Image uploaded successfully";
    }else{
      echo "Failed to upload image";
    }

    if ($error == '') {
      $r = mysqli_query($con,$sql);
      echo "New record created successfully";
    } else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
      echo "Email : ".$_POST['email']." already exits. ";
    }
  }
    // $con->close();

}

include('footer.php');

?>

