<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_learning";

try {
    session_start();
    // $con = mysql_connect("localhost","root","") or die(mysql_error());
    $con = mysqli_connect("localhost","root","") or die(mysqli_error());
    // $db = mysqli_select_db("fifanews",$con) or die(mysqli_error());
    $db = mysqli_select_db($con, $dbname) or die(mysqli_error());
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    
?>