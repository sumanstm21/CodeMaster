<?php include 'header.php'; ?>

<form action="login.php" method="POST">
    <input name="email" type="email" placeholder="email"><br/><br/>
    <input name="password" type="password" placeholder="password"><br/><br/>
    <button>LOGIN</button>
</form>

<?php
    if(isset($_POST['email'])){
        $sql = "SELECT * FROM user";
        $users = mysqli_query($con,$sql);

        foreach($users as $user){
            if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
                // $_SESSION['user_id'] = $user['full_name'];
                if($user['status'] == 'Admin'){
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                // echo 'logged in';
                header('Location: profile.php');
                $conn->close();
                } else{
                    echo 'Sorry Only User with Administration status can be logged in.';
                }
            } else {
                // echo "0 results";
                $content = 'error username or password';
            }
        }
    }

    include_once('footer.php');
?>

