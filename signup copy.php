<?php
 require_once('nav.php'); 

 $sql ="select * from course order by course_id desc";
 $courses = mysqli_query($con,$sql);

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
          <p>Create an account today</p>
          <form method="POST" action="login.php" enctype="multipart/form-data">
            <div class="form">
                <div>
                First Name : <input type="text" name="first_name" class="form-control" placeholder="First Name"><br/>
                </div>
                <div>
                Last Name : <input type="text" name="last_name" class="form-control" placeholder="Last Name"><br/>
                </div>
                <div>
                Email : <input type="email" name="email" class="form-control" placeholder="Email Address"><br/>
                </div>
                <div>
                Password : <input type="password" name="password" class="form-control" placeholder="Password"><br/>
                </div>
                <div>
                  <input type="hidden" name="status" value="User" />
                </div>
                <div>
                <input type="file" name="avatar_image"><br/>
                </div>
            </div>
            <br/>
            <button type="submit" name="submit" class="btn-outline-success">Sign Up</button>
            </form>
          <a href="login.php">or Log in</a>
        </div>
      </div>
    </div>
    <!--courses-->
    <div id="coursesSection">
      <h1>See available courses</h1>
      <i class="fas fa-chevron-down"></i>
      <div id="coursesInnerDiv" class="bg-darkblue white mt-3">
        <button class="accordion">Topic 1</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>
        <button class="accordion">Topic 2</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>
        <button class="accordion">Topic 3</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>   
      </div>
    </div>
    <div id="aboutSection" class="spacing">
      <h1>
        Learn how to Code with CodeMaster
      </h1>
      <p id="aboutP">
        CodeMaster is an online learning community with hundreds of classes for
        people interested in database, on topics including normalization, SQL,
        connecting database and frontend and many more. We would be happy to see
        you on CodeMaster!
      </p>
      <img src="images/hor_line.png" alt="line" id="horLine" />
      <div id="aboutGrid">
        <div class="aboutElement">
          <h2>Watch tutourials</h2>
          <p>
            Forget about books, notes and university lectures! Watch tutourials
            on CodeMaster anywhere, anytime at your own pace.
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Learn by doing</h2>
          <p>
            You don't feel like you can keep your focus for the entire lesson?
            Check your skills with excercise after every lesson!
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Get certificates</h2>
          <p>
            On CodeMaster by passing all the excercises and project you can get
            a valuable certificates!
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Track your progress</h2>
          <p>
            Stay motivated by tracking your progress! We make it easy for you to
            keep an eye on your activity statistics.s
          </p>
          <button class="btn darkBtn bg-darkblue neon-green p-10">Learn more</button>
        </div>
      </div>
    </div>
</main>


<?php

if(isset($_POST["submit"])) {
    $error = '';
    if(empty($_POST['email']) && empty($_POST['password'])){
      echo 'Please Enter Email and Password';
    } else {
      $image = $_FILES['avatar_image']['name'];
      $target = "images/".basename($image);
  
      $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `avatar_img`, `status`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$_POST['password']."', '".$image."', '".$_POST['status']."')";
      // $sql = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `avatar_img`) VALUES (NULL, 'z', 'z', 'z', 'z', 'z')";
  
      if (move_uploaded_file($_FILES['avatar_image']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
      }else{
        echo "Failed to upload image";
      }
  
      if ($error == '') {
        $r = mysqli_query($con,$sql);
        echo "New record created successfully";
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Email : ".$_POST['email']." already exits. ";
      }
    }
      // $con->close();
  
  }



require_once('footer.php'); 


?>
    
