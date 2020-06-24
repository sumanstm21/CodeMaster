<?php 
include('header.php');
$id=$_GET["id"];
if(isset($_POST["submit"])) {
  $title = $_POST["title"];
  $description = $_POST["description"];
  $videolink = $_POST["video_link"];

  $sql=" Update lesson set title='$title',description='$description', video_link='$videolink' Where lesson_id='$id'";

  $r=mysqli_query($con,$sql);	
  echo "Data Updated.";
}


$sql=" select * from lesson where lesson_id='$id'";
$r=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($r)) {
  $title=$row['title'];
  $description=$row['description'];
  $videolink=$row['video_link'];
}
?>
<h2>Update Lesson</h2>
<form method="POST" action="#" enctype="multipart/form-data">
<div class="form-group">
    <label for="inputAddress2">Select course</label><br/>
    <select id="course " name="course_id">
    <?php 
      $sql ="select * from course order by course_id desc";
      $result = mysqli_query($con,$sql);
      
      while($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?= $row["course_id"] ?>"><?= $row["title"]; ?></option>
      <?php } ?>
  </select>
  </div>
  <div class="form-group">
    <label for="inputAddress">Title</label>
    <input type="text" class="form-control"  name="title" id="inputAddress" value="<?= $title ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <textarea class="form-control" id="inputAddress2" name="description"><?= $description ?></textarea>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Video Link</label>
    <textarea class="form-control" id="inputAddress2" name="video_link"><?= $videolink ?></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

include('footer.php');
?>