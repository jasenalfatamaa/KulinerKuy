<?php

require 'functions.php';

$restaurants = query("SELECT * FROM restaurants");

if (isset($_GET["category"])) {
  $category = $_GET["category"];

  $restaurants = query("SELECT * FROM restaurants WHERE category = '$category'");
}

if (isset($_GET["location"])) {
  $location = $_GET["location"];

  $restaurants = query("SELECT * FROM restaurants WHERE location LIKE '%$location%'");
}

if (isset($_POST["search"])) {
  $restaurants = search($_POST["keyword"]);
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

    <title>Restaurant</title>
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
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown my-1">
                <a class="nav-link dropdown-toggle" aria-current="page" href="#" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Restaurant.php">All</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?category=food">Food</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?category=beverage">Beverage</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown my-1">
                <a class="nav-link dropdown-toggle" aria-current="page" href="#" data-bs-toggle="dropdown" aria-expanded="false">Location</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="?location=jakarta">Jakarta</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=bandung">Bandung</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=surabaya">Surabaya</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=bali">Bali</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=semarang">Semarang</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=medan">Medan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=yogyakarta">Yogyakarta</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="?location=palembang">Palembang</a></li>
                </ul>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link" href="index.php#about">About</a>
              </li>
            </ul>
            <form class="d-flex ms-auto my-2" action="" method="post">
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


    <!-- Restaurant -->
    <section class="restaurant">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Restaurant</h3>
                    <hr>
                    <br>
                </div>
            </div>
            <div class="row">

              <?php foreach ($restaurants as $restaurant) : ?>
                <div class="col-sm-6 col-md-4 col-xl-3 mt-3 makanan">
                  <div class="card mx-auto mb-3" >
                    <a href="HalamanRestaurant.php?id=<?= $restaurant["id"] ?>"><img src="restaurant/<?= $restaurant["image"] ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?= $restaurant["name"] ?></h5>
                        <div class="city">
                          <i class="fas fa-map-marker-alt"></i> <?= $restaurant["location"] ?>
                        </div>
                        <div class="creator">
                          <?php if ( !$restaurant["creator"] ) :?>
                            <b>Admin</b>
                          <?php else :?>
                          <b>Added by</b> <?= " ".$restaurant["creator"] ?>
                        <?php endif; ?>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>

              <div class="col-sm-6 col-md-4 col-xl-3 mt-3 makanan">
                <a href=" <?php if (isset($_COOKIE['key1']) && isset($_COOKIE['key2'])) : ?>
                            <?= "Add.php"; ?>
                          <?php else :?>
                            <?= "Login.php"; ?>
                          <?php endif; ?>">
                  <div class="card mx-auto mb-3 add" >
                    <div class="my-auto text-center">
                      <i class="fas fa-plus-circle"></i>
                    </div>
                  </div>
                </a>
              </div>

            </div>
        </div>
    </section>
    <!-- Akhir Restaurant -->


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