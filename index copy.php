<?php
ob_start();
 include_once('nav.php'); 
 $content = 'Log In your account';
//  $sql ="select * from course order by course_id desc";
//  $courses = mysqli_query($con,$sql);

 if(isset($_POST['submit'])){
  $sql = "SELECT * FROM user";
  $users = mysqli_query($con,$sql);

  foreach($users as $user){
      if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
          // $_SESSION['user_id'] = $user['full_name'];
          $_SESSION['user_id'] = $user['user_id'];
          $_SESSION['email'] = $user['email'];
          // header ();
          // echo 'hello world';
          // exit();
          header('Location: profile.php');
      } else {
          // echo "0 results";
          $content = 'error username or password';
      }
  }
}

?>
<main id="landingpage">
<div id="mainHeader" class="spacing">
      <div>
        <div id="heroText" class="neon-green">
          <p class="heroCaption">Learn from the best teachers</p>
          <h1 class="heroHeading">Become a CodeMaster</h1>
          <p class="heroCaption">and get your dream job</p>
        </div>
        <img src="images/main_hero.png" id="mainImg" />
      </div>
      <div id="logInArea">
        <div id="logInDiv" class="bg-darkblue-box">
          <h1>Become a CodeMaster for free</h1>
          <p><?= $content; ?></p>
          <form method="POST">
            Email : <input name="email" type="email" placeholder="email"><br/><br/>
            Pasword : <input name="password" type="password" placeholder="password"><br/><br/>
            <input type="submit" name="submit">
          </form>
        </div>
      </div>
    </div>
    <!--courses-->
</main>


<?php

require_once('footer.php'); 

?>
    
