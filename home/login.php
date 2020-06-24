<?php
include_once('connection.php');
 session_start();
    if(isset($_SESSION['username']))
    {
        header('Location: profile.php');
        exit();
    }

    $content = '
        <form action="login.php" method="POST">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>LOGIN</button>
        </form>
        ';

    if(isset($_POST['email'])){
        $sql = "SELECT * FROM users";
        $users = $conn->query($sql);

        foreach($users as $user){
            if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
                $_SESSION['username'] = $user['full_name'];
                $_SESSION['email'] = $user['email'];
                // echo 'logged in';
                header('Location: profile.php');
                $conn->close();
            } else {
                echo "0 results";
                $content = 'error username or password';
            }
        }
    }
    include_once('masterpage.php');
?>

