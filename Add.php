<?php

require 'functions.php';

if (isset($_POST["add"])) {
  if (add($_POST) > 0) {
    echo "<script>
            alert('Restoran berhasil ditambahkan!');
            document.location.href = 'Restaurant.php';
        </script>";
  }
  else {
    echo "<script>
            alert('Restoran gagal ditambahkan!');
            document.location.href = 'Restaurant.php';
        </script>";
  }
  
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

    <link href="styles.css" rel="stylesheet" >

    <title>Add Restaurant</title>
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
            <form class="d-flex ms-auto my-2" action="Restaurant.php" method="post">
              <input class="form-control me-2" type="search" name="keyword" id="keyword" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit" name="search" id="search"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav ms-1 mb-2 mb-lg-0">
              <li class="nav-item">
              <?php if(isset($_SESSION["login"])) :?>
                <a class="nav-link account" href="Account.php"><i class="fas fa-user-circle"></i></a>
              <?php else :?>
                <a class="nav-link account" href="Login.php"><i class="fas fa-user-circle"></i></a>
              <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- Add Restaurant -->
    <section class="add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mx-auto mb-5">
                        <div class="row">
                            <div class="col-sm-12 my-3 account">
                                <i class="fas fa-plus-circle"></i> Add Restaurant
                            </div>
                        </div>
                        <hr>
                        <form action="" method="post" class="my-3 mb-5 mx-5">
                            <div class="input">
                                <input type="text" name="Rname" id="Rname" class="form-control" placeholder="Restaurant Name" required>
                            </div>
                            <br>
                            <div class="input">
                                <select class="form-select" name="category" id="category">
                                    <option value="food">Food</option>
                                    <option value="beverage">Beverage</option>
                                </select>
                            </div>
                            <br>
                            <div class="input">
                                <input type="text" name="location" id="location" class="form-control" placeholder="Location (jika lebih dari 1 pisahkan dengan tanda ' , ' )" required>
                            </div>
                            <br>
                            <div class="input">
                                <input type="file" name="img" id="img" class="form-control" placeholder="Image" required>
                            </div>
                            <br>
                            <div style="margin-block: 5px;">
                                <textarea name="review" id="review" placeholder="Type your review" required></textarea>
                            </div>
                            <br>
                            <div class="regisPosition text-center">
                              <button type="submit" name="add" class="addbtn">Add</button>
                              <button type="reset" class="addbtn">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Add Restarant -->



    <script src="js/bootstrap.js"></script>

    <script src="js/jquery-1.js"></script>

    <script src="script.js"></script>


  </body>
</html>