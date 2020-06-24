<?php
include 'nav.php';
$id=$_GET["id"];

$sqlc ="select * from course order by course_id desc";
$courses = mysqli_query($con,$sqlc);

$sql=" select * from lesson where lesson_id='$id'";
$r=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($r)) {
    $title=$row['title'];
    // $title1=$row['course_id'];
    $description=$row['description'];
    $videolink=$row['video_link'];
    $date = $row['created_at'];
}
?>
<?php
// echo $date;
// // echo $title1;
// echo $title;
// echo $videolink;
// echo $description;
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
            <div class="col-md-12  col-lg-12 bg-darkblue-box" style="padding: 10px; margin-bottom:10px;">
                <h1 class="neon-green"><?php echo $title; ?>
                <a href="lesson_favourite.php?id=<?= $id ?>" class="neon-green">
                <svg class="bi bi-heart" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>
                </a>
                </h1>
            </div>
              <div class="col-md-12 embed-responsive embed-responsive-16by9">
                <iframe
                  class="embed-responsive-item"
                  src="https://www.youtube.com/embed/QpdhBUYk7Kk"
                ></iframe>
              </div>
              <!--script-->
              <div class="col-md-12  col-lg-12 bg-darkblue-box bg-box-spacing">
                <h1 class="neon-green">Description</h1>
                <div id="script-txt" class="bg-white-box">
                  <?php echo $description; ?>
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
<script src="main.js"></script>
</body>
</html>