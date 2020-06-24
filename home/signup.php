<?php
include_once('connection.php');
session_start();

$content = '
<form method="POST" action="signup.php" enctype="multipart/form-data">
  <div class="form">
    <div class="col-3">
      Full Name : <input type="text" name="full_name" class="form-control" placeholder="Full Name"><br/>
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
';

if(isset($_POST['email'])){
  $image = $_FILES['avatar_image']['name'];
  $target = "images/".basename($image);
  // echo 'posted';
  $sql = "INSERT INTO users (`full_name`, `email`, `password`, `avatar_image`) VALUES ('".$_POST['full_name']."', '".$_POST['email']."', '".$_POST['password']."', '".$image."')";
  
  if (move_uploaded_file($_FILES['avatar_image']['tmp_name'], $target)) {
    $content = "Image uploaded successfully";
  }else{
    $content = "Failed to upload image";
  }
  
  if ($conn->query($sql) === TRUE) {
    $content =  "New record created successfully";
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    $content =  "Email : ".$_POST['email']." already exits. ";
  }
  
  $conn->close();
}
include('masterpage.php');
?>

