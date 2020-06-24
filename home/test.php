<?php 
 include_once('connection.php');
 session_start();
$email = $_SESSION["email"];
$content = 'welcome to dashboard, '.$_SESSION['username'];
$sql = "SELECT * FROM users";
$users = $conn->query($sql);

print_r($users);
foreach($users as $user){
    print_r($user);
    echo $user['email'];
}