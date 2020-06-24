<?php 
include('header.php');

$id=$_GET["id"];
if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql=" Update course set title='$title',description='$description' Where course_id='$id'";

    $r=mysqli_query($con,$sql);	
    echo "Data Updated.";
}


$sql=" select * from course where course_id='$id'";
$r=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($r)) {
    $title=$row['title'];
    $description=$row['description'];

}
?>

<h2>Update Course</h2>

<form method="POST" action="#" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputAddress">Title</label>
    <input type="text" class="form-control"  name="title" id="inputAddress" value="<?= $title ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <textarea class="form-control" id="inputAddress2" name="description"><?= $description ?></textarea>
  </div>
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" /> 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>







<?php

include('footer.php');
?>