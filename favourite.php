<?php
include_once 'nav.php';
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"> Your Favourite Course List</th>
    </tr>
  </thead>
  <tbody>
<?php

if(isset($_GET["mode"])) {
  $userid = $_SESSION['user_id'];
	$id = $_GET["id"];
	$sql=" delete from user_favourite where lesson_id='$id' && user_id='$userid' ";
		$result = mysqli_query($con,$sql);
}

$sql ="select * from course order by course_id";
$courses = mysqli_query($con,$sql);
if(isset($_SESSION['user_id'])){
    $userid = $_SESSION['user_id'];
  } else {
    $userid = 0;      
  }
  $sqlr=" select * from user_favourite where user_id='$userid'";
  $r=mysqli_query($con,$sqlr);
    $found = 0;
    while($row = mysqli_fetch_array($courses)){
        $courseid = $row["course_id"];
                 $sql_lesson ="select * from lesson where course_id = $courseid ";
                //  $sql_favourite ="select * from user_favourite where user_id = ";
                 $lesson = mysqli_query($con,$sql_lesson);    
                 while($lessonrow = mysqli_fetch_array($lesson)){
                   $lessonid = $lessonrow["lesson_id"];

                    foreach($r as $data)
                    {
                        if($data['user_id'] == $userid && $data['lesson_id'] == $lessonrow["lesson_id"])
                        {
                          ?>
                            <tr>
                            <td><a href="lesson.php?id=<?= $lessonid ?>"><?= $lessonrow["title"] ?></a></td>
                            <td><a href="?mode=delete&id=<?= $lessonid ?>">Delete</a></td>
                            </tr>    
                          <?php
                        }
                    }
    
                }
            }
        
if($userid == 0){
    echo 'Please Log In to Add Lessons to your Favourite list';
}

?>
</tbody>
</table>