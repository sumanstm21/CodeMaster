<?php 
 include_once('connection.php');
 session_start();
$email = $_SESSION["email"];
$content = "welcome to dashboard";
$sql = "SELECT * FROM users";
$users = $conn->query($sql);

foreach($users as $user){
    if($user['email'] == $email){
        $fullname = $user['full_name'];
        $image = $user['avatar_image'];
        $imagelocation = "images/$user['avatar_image']";
        echo $image;
        // $image = '<img src='images/".$user['avatar_image']."' >';
        $content = "
        <h2>Name :  $fullname</h2>
        <h3>Email : $email</h3>
        <img src='images/$image'>
        <img src='$imagelocation'>
        ";
    }
}

include('masterpage.php');
