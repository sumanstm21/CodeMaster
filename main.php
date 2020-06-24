<?php
require_once('nav.php'); ?>
<main>
<h1 class="text-center">Welcome : <?= $_SESSION['email']; ?></h1><br/>
<div class="d-flex flex-column justify-content-between mt-6">
    <h1 class="text-center">Your Courses</h1>
    <!--Slideshow-->
<div id="carouselExampleInterval" class="carousel slide bgGr dn db-ns mb-4" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="false">
      <!--one container for three containers-->
      <div class="carousel-container d-flex flex-row justify-content-between mt-1 mr-6 ml-6 pt-4 pb-4">
        <!--single container-->
        <?php
          $sql ="select * from course order by course_id limit 3";
          $courses = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));

          while($row = mysqli_fetch_array($courses)){
        ?>
        <div class="container1 d-flex flex-column justify-content-between d-block w-30 p-1 " style="width: 30%">
          <!--topic heading-->
          <h1 class="text-center my-1 f4"><?= $row['title'] ?></h1>
                <!--progressbar and text on side-->
              <div class="d-flex flex-row align-items-center">
                <div class="progress bg-darkblue mr-1 ml-3  w-50 " id="progressWi">
                    <div class="progress-bar " role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                      <span class="sr-only">70% Complete</span>
                    </div>
                </div>
                <div class="btnF1 ml-1  w-50">
                    5/10 lessons left
                </div> 
            </div>
             <!--button--> 
          <div class="text-center m-1">
            <button type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
          </div>
        </div>
        <!-- second single container-->
                <!--third single container-->
        
          <?php } ?>
      </div>
    <!--one container ends here-->
    </div>


    <div class="carousel-item" data-interval="false">
   
<!--second whole container for three containers-->
      <div class="carousel-container d-flex flex-row justify-content-between mt-1 mr-6 ml-6  pt-4 pb-4">
        <!--single container-->
        <div class="container1 d-flex flex-column justify-content-between d-block w-30  p-1" style="width: 30%">
          <!--topic heading-->
          <h1 class="text-center my-1 f4">Sql Server</h1>
                <!--progressbar and text on side-->
              <div class="d-flex flex-row align-items-center">
                <div class="progress bg-darkblue mr-1 ml-3 w-50" id="progressWi">
                    <div class="progress-bar " role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                      <span class="sr-only">70% Complete</span>
                    </div>
                </div>
                <div class="btnF1 ml-1 w-50">
                    5/10 lessons left
                </div> 
            </div>
             <!--button--> 
          <div class="text-center m-1">
            <button type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
          </div>
        </div>
        <!-- second single container-->
        <div class="container1 d-flex flex-column justify-content-between d-block w-30  p-1"  style="width: 30%">
          <!--topic heading-->
          <h1 class="text-center my-1 f4">Oracle</h1>
                <!--progressbar and text on side-->
              <div class="d-flex flex-row align-items-center">
                <div class="progress bg-darkblue mr-1 ml-3 w-50" id="progressWi">
                    <div class="progress-bar " role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                      <span class="sr-only">70% Complete</span>
                    </div>
                </div>
                <div class="btnF1 ml-1 w-50">
                    5/10 lessons left
                </div> 
            </div>
             <!--button--> 
          <div class="text-center m-1">
            <button type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
          </div>
        </div>
        <!--third single container-->
        <div class="container1 d-flex flex-column justify-content-between d-block w-30  p-1"  style="width: 30%">
          <!--topic heading-->
          <h1 class="text-center my-1 f4">No SQL</h1>
                <!--progressbar and text on side-->
              <div class="d-flex flex-row align-items-center">
                <div class="progress bg-darkblue mr-1 ml-3 w-50" id="progressWi">
                    <div class="progress-bar " role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                      <span class="sr-only">70% Complete</span>
                    </div>
                </div>
                <div class="btnF1 ml-1 w-50">
                    5/10 lessons left
                </div> 
            </div>
             <!--button--> 
          <div class="text-center m-1">
            <button type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--mobile one?-->
    <!--BOTTOM PART-->
    <div id="coursesSection" class="mt-5">
      <h1>See available courses</h1>
      <i class="fas fa-chevron-down"></i>
      <div id="coursesInnerDiv" class="bg-darkblue white mt-3">
      <?php
      $sql ="select * from course order by course_id";
      $courses = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));
      $row = mysqli_fetch_array($courses);
      foreach($courses as $r){
      ?>
        <button class="accordion"><?= $r['title']; ?></button>
        <div class="panel pl-5">
          <ol>
          <?php 
          $courseid = $r['course_id'];
          $sql2 ="select * from lesson where course_id = $courseid ";
          $lesson = mysqli_query($con,$sql2) or die("Error: " . mysqli_error($con));
          foreach($lesson as $l){
          ?>
            <li><a href="lesson.php?id=<?= $l['lesson_id'] ?>"><?= $l['title'] ?></a></li>
          <?php } ?>
          </ol>
        </div>
        <?php
      }
        ?>
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
  <footer class="footer">
  <div class="d-flex justify-content-between align-items-center ">
      <div class="icons flex flex-row ml-md-4 ml-sm-2 my-3 mr-2">
        <a href="#">
          <i class="fab fa-instagram fa-2x"></i>
        </a>
        <a href="#">
          <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="#">
          <i class="fab fa-linkedin fa-2x "></i>
        </a>  
      </div>
      <div class="mr-md-4 mr-sm-2">
        <p class="white mb-0">Web Development, Semester 1</p>
      </div>   
  </div>
</footer>
    <script src="main.js"></script>
  </body>
</html>