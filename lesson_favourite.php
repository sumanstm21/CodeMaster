<?php
include 'nav.php';

$id = $_GET["id"];
$userid = $_SESSION['user_id'];

// echo $id;
// echo $userid;

$sqlr=" select * from user_favourite where user_id='$userid'";
$r=mysqli_query($con,$sqlr);
$found = 0;
foreach($r as $data)
{
    if($data['user_id'] == $userid && $data['lesson_id'] == $id)
    {
        // echo 'here ';
        // echo $userid.'<br/>';
        // echo $id.'<br/>';
        $found = 1;
    }
}
    if($found == 1){
        // echo $userid;
        // echo $id;
        echo '<p>Already Added to Favourites</p>';
        header ('Location: index.php');
    } else {
        $sqls = "INSERT INTO `user_favourite` (`user_id`, `lesson_id`, `status`) VALUES ('$userid', '$id', '1')";
        $rs=mysqli_query($con,$sqls);
        echo '<p>Added to Favourites</p>';
        header ('Location: main.php');

    }

?>