<?php 
include('header.php');
?>
<h2>Add Lesson</h2>
<form method="POST" action="lesson_add.php" enctype="multipart/form-data">
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
    <input type="text" class="form-control"  name="title" id="inputAddress" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <textarea class="form-control" id="inputAddress2" name="description" placeholder="Description"></textarea>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Video Link</label>
    <textarea class="form-control" id="inputAddress2" name="video_link" placeholder="Video Link"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $videolink = $_POST["video_link"];
    $courseid = $_POST["course_id"];
    $userid = $_SESSION['user_id'];
        
        // $sql =" INSERT INTO stadium(title,picture,news) VALUES ('$title','$picture','$news') ";
        // $sql = "INSERT INTO `lesson` (`title`, `description`, `user_id`) VALUES ('$title', '$description', '$userid')";
        $sql = "INSERT INTO `lesson` (`course_id`, `title`, `description`, `video_link`) VALUES ('$courseid', '$title', '$description', '$videolink')";
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