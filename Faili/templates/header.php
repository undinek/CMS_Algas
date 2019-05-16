<?php
session_start();
include_once ("includes/Role.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Algu aprēķina sistēma</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Algu aprēķina sistēma |</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard-view.php"><i class="fa fa-home">&nbsp;</i>Sākums<span
                        class="sr-only">(current)</span></a>
            </li>


            <?php if (isset($_SESSION["isLoggedIn"])): ?>
                  <?php $role = new Role; ?>
                  <?php if ($role->superAdmin()): ?>
                      <li class="nav-item active">
                          <a class="nav-link" href="organization-view.php"><i class="far fa-building">&nbsp;</i>Organizācijas</a>
                      </li>
					   <li class="nav-item active">
                      <a class="nav-link" href="user-view.php"><i class="fa fa-user">&nbsp;</i>Lietotāji</a>
                  </li>


                  <?php
    elseif ($role->admin()): ?>
                      <li class="nav-item active">
                          <a class="nav-link" href="add-salary-view.php"><i class="fa fa-plus ">&nbsp;</i>Algas</a>
                      </li>
					   <li class="nav-item active">
                      <a class="nav-link" href="user-view.php"><i class="fa fa-user">&nbsp;</i>Lietotāji</a>
                  </li>
					  
					  <?php
    elseif ($role->user()): ?>
                      <li class="nav-item active">
                          <a class="nav-link" href="salary-view.php"><i class="fa fa-eye ">&nbsp;</i>Mana alga</a>
                      </li>

                  <?php
    endif; ?>
                 
                  <li class="nav-item active">
                      <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i>Atslēgties</a>
                  </li>
            <?php
endif; ?>
        </ul>
    </div>
</nav>
