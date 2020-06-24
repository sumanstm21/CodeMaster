<?php 
 include_once('header.php');
$email = $_SESSION["email"];

$sql = "SELECT * FROM user";
$users = mysqli_query($con,$sql);;

foreach($users as $user){
    if($user['email'] == $email){
        $fullname = $user['first_name'];
        $image = $user['avatar_img'];
        // $imagelocation = "images/$user['avatar_img']";
        // <img src='$imagelocation'>
        echo $image;
        // $image = '<img src='images/".$user['avatar_image']."' >';
        $content = "
        <h2>Name :  $fullname</h2>
        <h3>Email : $email</h3>
        ";
    }
}
echo $content;

include 'footer.php';