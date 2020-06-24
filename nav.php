<?php
ob_start();
    include_once('connection.php'); 
    // echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font-->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <!--own CSS-->
    <link rel="stylesheet" href="style.css" />
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <title>Code Master</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg  bg-darkblue ">
      <!--logo-->
      <a class="navbar-brand" href="main.php">
        <img src="images/logo.png" width="80%" alt="logo"
      /></a>
      <!--burgermenu-->
      <button
        class="navbar-toggler "
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i></span>
      </button>

      <!--nav inside burgermenu and outside-->
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <!--search-->
        <form class="form-inline  mx-auto my-3 my-lg-0 ">
          <div class="input-group ">
            <input
              id="searchBar"
              type="text"
              class="form-control "
              placeholder="Search for available courses"
            />
            <div class="input-group-append">
              <button
                class="btn btn-outline-success "
                id="srchBtn"
                type="submit"
              >
                <svg
                  class="bi bi-search"
                  width="1em"
                  height="1em"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"
                  />
                </svg>
              </button>
            </div>
          </div>
        </form>
        <!--All the Links on the right side -->
        <ul class="navbar-nav  ">
          <!--about-->
          <li class="nav-item mr-4 my-2 my-lg-0  ">
            <a class="nav-link " href="userDashboard.php#aboutSection">About</a>
          </li>
          <!--courses-->
          <li class="nav-item dropdown mr-4 my-2 my-lg-0 ">
            <a
              class="nav-link "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              My Courses
            </a>
            <div
              class="dropdown-menu dropdown-menu-right bg-darkblue"
              aria-labelledby="navbarDropdown"
            >
            <?php
          $sql ="select * from course order by course_id limit 3";
          $courses = mysqli_query($con,$sql);

          while($row = mysqli_fetch_array($courses)){
          ?>

              <a class="dropdown-item" href="#">
                <div class="flex flex-column">
                  <p class="m-0 text-center"><?= $row['title']; ?></p>
                  <div class="progress">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="70"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width:70%"
                    >
                      <span class="sr-only">70% Complete</span>
                    </div>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
          <?php } ?>
          </li>
          <!--heart-->
          <li class="nav-item dropdown mr-4 my-2 my-lg-0 ">
            <a href='favourite.php'><svg style="margin-top:10px" class="bi bi-heart" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></a>
          <!--signed in user-->
          <li class="nav-item dropdown mr-4 my-2 my-lg-0 ">
            <a
              class="nav-link"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <svg
                class="bi bi-person"
                width="1.7em"
                height="1.7em"
                viewBox="0 0 16 16"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                />
              </svg>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right bg-darkblue"
              aria-labelledby="navbarDropdown"
            >
            <?php if(isset($_SESSION['email'])){ ?>
              <a class="dropdown-item" href="main.php"><?= $_SESSION['email']; ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="courses.php">Courses</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="btn ml-2 btn-outline-success" href="logout.php">Log Out</a>
            <?php } else { ?>
              <a class="dropdown-item" href="signup.php">Signup</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Login.php">Log In</a>
              <div class="dropdown-divider"></div>
            <?php } ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
