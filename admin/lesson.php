<?php 
include('header.php');
?>
<h2>Lessons</h2>
<a href="lesson_add.php" class="btn btn-success">Add Lesson</a>

<?php
if(isset($_GET["mode"])) {
	$id=$_GET["id"];
	$sql=" delete from lesson where lesson_id='$id' ";
		$result = mysqli_query($con,$sql);
}

$sql ="select * from lesson order by lesson_id desc";
// $sqljoin = "SELECT lesson.lesson_id, lesson.title, lesson.description, course.title
// FROM lesson
// LEFT JOIN course ON lesson.course_id = course.course_id
// GROUP BY lesson.lesson_id";
$result = mysqli_query($con,$sql);
?>
<br/><br/>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <!-- <th>Course</th> -->
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
    while($row = mysqli_fetch_array($result)) {
        // print_r($row);
        // exit();
	echo "<tr>";
	echo "<td>".$row['title']."</td>";
	// echo "<td>".$row['course']."</td>";
    echo "<td>".$row['description']."</td>";
	echo "<td><a href='lesson_update.php?id={$row['lesson_id']}'>Update</a> <a href='?mode=delete&id={$row['lesson_id']}'>Delete</a></td>";
	echo "</tr>";

}
?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>
<?php
include('footer.php');
?>
