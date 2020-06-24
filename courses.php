<?php
ob_start();
 include_once('nav.php'); 

 $sql ="select * from course order by course_id";
 $courses = mysqli_query($con,$sql);
//  if (!$check1_res) {
//   printf("Error: %s\n", mysqli_error($con));
//   exit();
// }

//  while($rows = mysqli_fetch_array($courses)){
//    echo '1';
//  }
?>
    <main>
      <!-- Container overview and video/script -->
      <div class="container-fluid">
        <div class="row justify-content-between spacing">
          <div class=" col-md-4 col-lg-3  bg-darkblue-box">
            <!--Overview of lessons and topics-->
            <div id="overview">
            <?php 
              $userid = 1;
              if(isset($_SESSION['user_id'])){
                $userid = $_SESSION['user_id'];
              }
              $sqlr=" select * from user_favourite where user_id='$userid'";
              $r=mysqli_query($con,$sqlr);
              $found = 0;
            // echo 'here';
            while($row = mysqli_fetch_array($courses)){ ?>
              <button class="topic-btn white active"><?= $row["title"]; ?></button>
              <div class="lessons-list white show">
                <ul>
                <?php 
                 $courseid = $row["course_id"];
                 $sql_lesson ="select * from lesson where course_id = $courseid ";
                //  $sql_favourite ="select * from user_favourite where user_id = ";
                 $lesson = mysqli_query($con,$sql_lesson);    
                 while($lessonrow = mysqli_fetch_array($lesson)){
                   $lessonid = $lessonrow["lesson_id"];

                    foreach($r as $data)
                    {
                        if($data['user_id'] == $userid && $data['lesson_id'] == $lessonrow["lesson_id"])
                        {
                          $found = 1;
                        }
                    }
                    // echo $found;
                ?>
                  <li class="list-row neon-green">
                    <div  class="heart-icon"></div>
                    <?php if($found == 1){ ?>
                      <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    <?php } ?>
                    <div>
                      <a href="lesson.php?id=<?= $lessonid ?>" class="neon-green"><?= $lessonrow["title"] ?></a>
                    </div>
                    <div class="check-load-icon"><i class="fas fa-check"></i></div>
                  </li>
                 <?php 
                  $found = 0;
                  }
                 ?>
              </div>
            <?php } ?>
              <!--2-->
              <!--3-->
              <!--4-->
              <!--5-->
              <!--6-->
              <!--end of list -->
              
            </div>
            <!--end of overview-->
            <div id="overlay">
              <div id="left-line"></div>
              <div id="right-line"></div>
            </div>
          </div>

          <div class="col-md-7 col-lg-8 ">
            <!-- nested for video/script -->
            <div class="row ">
              <div class="col-md-12 embed-responsive embed-responsive-16by9">
                <iframe
                  class="embed-responsive-item"
                  src="https://www.youtube.com/embed/QpdhBUYk7Kk"
                ></iframe>
              </div>
              <!--script-->
              <div class="col-md-12  offset-lg-2 col-lg-8 bg-darkblue-box bg-box-spacing">
                <h1 class="neon-green">Script</h1>
                <div id="script-txt" class="bg-white-box">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                  Consequatur qui labore at impedit quam sed incidunt error
                  animi eaque velit, odio provident. Reprehenderit veritatis,
                  asperiores nostrum pariatur voluptatibus illo hic.<br /><br />
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptas ipsum qui porro velit exercitationem repellat
                  provident alias. Harum assumenda voluptatum dolores rem
                  explicabo est fugiat ut reiciendis incidunt. Eius,
                  consectetur.<br /><br />
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad
                  officiis quaerat ducimus suscipit corrupti laudantium vero
                  autem atque, aliquam dolor cumque ab sit dicta, architecto
                  provident consequuntur corporis omnis vitae?
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Container task and code editor-->
      <div class="container-fluid">
        <div class="row justify-content-between spacing">
           <!-- exercise container-->
          <div class="col-md-5 bg-darkblue-box bg-box-spacing">
            <h1 class="white">Exercise:</h1>
            <h1 class="neon-green">Normalization Form</h1>
            <div id="exercise-txt" class="bg-white-box">
              <p>
                Normalisation is a technique that consists of a series of rules
                whose application eliminates redundancy in a relational design.
                This course teaches you about the specific states called normal
                forms.
              </p>
              <h5>First Normal Form (1NF)</h5>
              <p>
                To normalize a model up to 1NF all its values must be atomic. In
                this exercise you will learn how a relation fulfills 1NF.
              </p>
              <h5>Second Normal Form (2NF)</h5>
              <p>
                A relation fulfils 2NF if it fulfils 1NF and every attribute
                that does not belong to the PK depends on the full PK. Note, if
                a relation has a simple PK (only formed by one attribute) in
                1NF, it automatically fulfills 2NF.
              </p>
              <h5>Third Normal Form (3NF)</h5>
              <p>
                A relation is normalised up to 3NF, if the relation fulfils 2NF
                and all attributes that do not belong to the PK don’t inform
                about other attributes, they are independent.
              </p>
            </div>
          </div>
           <!--code editor-->
          <div class="col-md-6 bg-darkblue-box bg-box-spacing" >
            <div class="bg-white-box" id="code-display-box">
              <p id="exercise-instruction">
                Pull all the records from the Customers table.
              </p>
              <div id="code-snippet">
                <!--numbers on the side of the code-->
                <ul>
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li>10</li>
                  <li>11</li>
                  <li>12</li>
                </ul>
                <!--where the inserted code is displayed-->
                <div class="p-2" id="code-placeholder"></div>
              </div>
            </div>
            <!--input for code-->
            <div class="input-group mb-3">
              <textarea
                id="code-input"
                type="text"
                class="form-control"
                rows="3"
                oninput="displayCode()"
                placeholder="Write your code here"
              ></textarea>
              <div class="input-group-append">
                <button
                  class="btn btn-light "
                  type="button"
                  id="button-addon2"
                  onclick="checkCode()"
                >
                  Go!
                </button>
              </div>
            </div>
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
<script src="app.js"></script>
  </body>
</html>

    
