<?php 
include('header.php');
?>
<h2>Courses</h2>
<a href="course_add.php" class="btn btn-success">Add Courses</a>

<?php
if(isset($_GET["mode"])) {
	$id=$_GET["id"];
	$sql=" delete from course where course_id='$id' ";
		$result = mysqli_query($con,$sql);
}

$sql ="select * from course order by course_id desc";
$result = mysqli_query($con,$sql);
?>
<br/><br/>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['title']."</td>";
    echo "<td>".$row['description']."</td>";
	echo "<td><a href='course_update.php?id={$row['course_id']}'>Update</a> <a href='?mode=delete&id={$row['course_id']}'>Delete</a></td>";
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
