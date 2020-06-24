<?php 
include('header.php');
?>
<h2>Add Course</h2>
<form method="POST" action="course_add.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputAddress">Title</label>
    <input type="text" class="form-control"  name="title" id="inputAddress" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <textarea class="form-control" id="inputAddress2" name="description" placeholder="Description"></textarea>
  </div>
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" /> 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $userid = $_SESSION['user_id'];
        // echo $userid;
        // exit();
    //     if(is_uploaded_file($_FILES['picture']['tmp_name'])){
    //     move_uploaded_file($_FILES['picture']['tmp_name'],"../stadiums/".$_FILES['picture']['name']);
    //     $picture=$_FILES['picture']['name'];
    // }
        
        // $sql =" INSERT INTO stadium(title,picture,news) VALUES ('$title','$picture','$news') ";
        $sql = "INSERT INTO `course` (`title`, `description`, `user_id`) VALUES ('$title', '$description', '$userid')";
        $result = mysqli_query($con,$sql);
        // ECHO $result;
        // exit();
        if($result) {
            echo "Data has been submitted. ";	
        } else {
            echo "Database error. ";	
        }
        
}



include('footer.php');
?>