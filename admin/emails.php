<?php 
include('header.php');
?>
<?php 
$sql = "call GetAllUserEmail()";
$result = mysqli_query($con,$sql);
foreach($result as $data)
{
    ?>
    <ul>
    <li><a href = "mailto: <?= $data['email'] ?>"><?= $data['email'] ?></a></li>
    </ul>
    <?php
}
?>
<?php
include('footer.php');
?>
