<?php

require 'functions.php';

$id = $_GET["id"];

$restaurants = query("SELECT * FROM restaurants WHERE id= $id")[0];

if (isset($_COOKIE["key1"])) {
    $userid = $_COOKIE["key1"];

    $users = query("SELECT * FROM users WHERE id= $userid")[0];
}
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&family=Lobster&family=PT+Serif:wght@700&family=Permanent+Marker&family=Pushster&family=Teko:wght@600&family=Vujahday+Script&display=swap" rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" href="styles.css">

    <title><?= $restaurants["name"] ?></title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top color">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><i class="fas fa-utensils"></i> KulinerKuy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item my-1">
                <a class="nav-link" aria-current="page" href="Kuliner.php">Home</a>
              </li>
              <li class="nav-item dropdown my-1">
                <a class="nav-link dropdown-toggle" aria-current="page" href="#" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Restaurant.php">All</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?category=food">Food</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?category=beverage">Beverage</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown my-1">
                <a class="nav-link dropdown-toggle" aria-current="page" href="#" data-bs-toggle="dropdown" aria-expanded="false">Location</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Restaurant.php?location=jakarta">Jakarta</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=bandung">Bandung</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=surabaya">Surabaya</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=bali">Bali</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=semarang">Semarang</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=medan">Medan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=yogyakarta">Yogyakarta</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Restaurant.php?location=palembang">Palembang</a></li>
                </ul>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link" href="Kuliner.php#about">About</a>
              </li>
            </ul>
            <form class="d-flex ms-auto my-2" action="Restaurant.php" method="post">
              <input class="form-control me-2" type="search" name="keyword" id="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
              <button class="btn btn-outline-success" type="submit" name="search" id="search"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav ms-1 mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="nav-link account" href="
                <?php if(isset($_SESSION["login"])) :?>
                  <?= "Account.php"; ?>
                <?php else :?>
                  <?= "Account.php"; ?>
                <?php endif; ?>">
                  <i class="fas fa-user-circle"></i>
              </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- Isi -->
    <section class="halresto">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-sm-12 mx-auto">
                    <div>
                        <h3 style="float:left;"><?= $restaurants["name"] ?></h3>
                        <?php if( isset($_COOKIE["key1"])) :?>
                            <?php if( $restaurants["creator"] == $users["name"] ) :?>
                                <a href="EditRestaurant.php?id=<?= $restaurants["id"] ?>">
                                    <div class="profile">
                                        Edit
                                    </div>
                                </a>
                            <?php endif ;?>
                        <?php endif; ?>
                     </div>
                    <hr>
                    <div>
                        <b>Location : </b><?= $restaurants["location"] ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-sm-12 mx-auto">
                    <img src="Carousel/<?= $restaurants["image"] ?>" alt="ChopStix Restaurant">
                    <div class="col-sm-12 mt-3">
                        <p>&emsp;&emsp;<?= $restaurants["review"] ?></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="card col-sm-12 mx-auto">
                    <h4>Rating</h4>
                    <hr style="width: 70px;">
                    
                </div>
            </div> -->
        </div>
    </section>
    <!-- Akhir Isi -->


        <!-- Footer -->
        <footer>
            <div class="container-fluid text-center">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-4">&copy;copyright 2021 | Made by 
                    <div style="font-family: 'Permanent Marker', cursive;">&nbsp;<i class="fas fa-utensils"></i> Kulinerkuy</div>
                    </div>
                </div>
              </div>
            </div>
        </footer>
        <!-- Akhir Footer -->

        
    <script src="js/bootstrap.js"></script>

    <script src="js/jquery-1.js"></script>

    <script src="script.js"></script>


  </body>
</html>