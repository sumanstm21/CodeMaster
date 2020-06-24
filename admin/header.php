<?php
ob_start();
include_once('../connection.php');
//  if(empty($_SESSION['email'])) 
//     { 
//         session_start(); 
//     }
?>
<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
</head>
<body>
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><a href="index.php">E-Learning</a></h3>
                </div>

                <?php if(isset($_SESSION['email'])){ ?>
                <ul class="list-unstyled components">
                    <p>CMS</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="course.php">Courses</a></li>
                            <li><a href="lesson.php">Lessons</a></li>
                            <!-- <li><a href="#">Home 3</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="emails.php">Emails</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
                <?php } ?>

                <!-- <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul> -->
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                            

                                <?php if(isset($_SESSION['email'])){ ?>
                                <!-- <li><a href="#">Page</a></li> -->
                                <li><a class="nav-link" href="profile.php"><?= 'Hi, '.$_SESSION['email']; ?> </a></li>
                                <li><a class="nav-link" href="logout.php">Log Out</a></li>
                                <?php } else { ?>
                                <!-- <li><a class="nav-link" href="about.php">About</a></li> -->
                                <li><a class="nav-link" href="signup.php">Sign Up</a></li>
                                <li><a class="nav-link" href="login.php">Log In</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>