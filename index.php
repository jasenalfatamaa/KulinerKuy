<?php

session_start();

?>




<!doctype html>
<html lang="en" id="Home">
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

    <title>KulinerKuy</title>
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
              <a class="nav-link home active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item my-1">
              <a class="nav-link page-scroll category" aria-current="page" href="#category">Category</a>
            </li>
            <li class="nav-item my-1">
              <a class="nav-link page-scroll location" aria-current="page" href="#location">Location</a>
            </li>
            <li class="nav-item my-1">
              <a class="nav-link page-scroll about" href="#about">About</a>
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


    <!-- Carousel -->
    <section class="home" id="home">
      <div class="container-fluid mx-auto">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8" aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9" aria-label="Slide 10"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="10" aria-label="Slide 11"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="11" aria-label="Slide 12"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="12" aria-label="Slide 13"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="13" aria-label="Slide 14"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="14" aria-label="Slide 15"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href=""><img src="Carousel/ChopStix Restaurant.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Gram Pancake Cafe.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Fire Tiger.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Gooma Tea Bar.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Miss Bee Providore.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Mare Nostrum Restaurant.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Melbourne Kitchen.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Mie Rica Kejaksaan.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Carbon Restaurant.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Monsieur Spoon Restaurant.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Mujigae.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Platinum Grill.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/R&B Tea.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/Taliwangi Bali.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href=""><img src="Carousel/WolfGangs SteakHouse.jpg" class="d-block w-100" alt="..."></a>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Akhir Carousel -->


    <!-- Category -->
    <section class="category" id="category">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h3 class="mt-4 mb-3">Category</h3>
            <hr>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="card categoryname mx-auto my-5 makan" >
              <a href="Restaurant.php?category=food"><img src="Makanan.jpg" class="card-img-top" alt="Makanan"></a>
              <div class="card-body">
                <h2>Food</h2>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="card categoryname mx-auto my-5 minum">
              <a href="Restaurant.php?category=beverage" ><img src="minuman.jpg" class="card-img-top" alt="Minuman"></a>
              <div class="card-body">
                <h2>Beverage</h2>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="card categoryname mx-auto my-5 makan" >
              <a href="Restaurant.php"><img src="makanan dan minuman.jpg" class="card-img-top" alt="Makanan"></a>
              <div class="card-body">
                <h2>All</h2>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="card categoryname mx-auto my-5 makan" >
              <a href="Restaurant.php"><img src="makanan dan minuman.jpg" class="card-img-top" alt="Makanan"></a>
              <div class="card-body">
                <h2>All</h2>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>
    <!-- Akhir Category -->


    <!-- Location -->
    <section class="location" id="location">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h3 class="mt-4 mb-3">Location</h3>
            <hr>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card text-center" >
              <a href="Restaurant.php?location=jakarta"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Jakarta</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card text-center" >
              <a href="Restaurant.php?location=bandung"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Bandung</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card text-center" >
              <a href="Restaurant.php?location=surabaya"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Surabaya</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card text-center" >
              <a href="Restaurant.php?location=bali"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Bali</h4>
              </div></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-3 mt-5">
            <div class="card text-center" >
              <a href="Restaurant.php?location=semarang"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Semarang</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-5">
            <div class="card text-center" >
              <a href="Restaurant.php?location=medan"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Medan</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-5">
            <div class="card text-center" >
              <a href="Restaurant.php?location=yogyakarta"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Yogyakarta</h4>
              </div></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-5">
            <div class="card text-center" >
              <a href="Restaurant.php?location=palembang"><div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt"></i></h3>
                <h4 class="card-subtitle mb-2 text-muted">Palembang</h4>
              </div></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Location -->


    <!-- About -->
    <section class="about" id="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h3 class="mt-4 mb-3">About</h3>
            <hr>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 offset-2 rata">
            <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora hic natus dignissimos quos neque aperiam distinctio dolores corporis nemo dolorum, ea eveniet voluptas accusantium similique ut nobis, aut ducimus maxime. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto incidunt beatae blanditiis doloribus fugit quis illo error non dolores recusandae fugiat accusamus dolore unde quam qui expedita, architecto minima asperiores.</p>
          </div>
          <div class="col-sm-4">
            <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut illum praesentium fuga eaque, tempora modi at sequi ducimus quos officiis sunt quidem temporibus nisi ullam consequuntur saepe in molestias? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quia minima labore reprehenderit corporis cupiditate magni culpa explicabo sapiente odit veniam quam vero incidunt laudantium possimus, fugiat corrupti dignissimos itaque!</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir About -->


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