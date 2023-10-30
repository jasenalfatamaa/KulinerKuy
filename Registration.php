<?php

require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan!');
          document.location.href = 'Kuliner.php';
          </script>";
  }
  else {
    $email = stripslashes($_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    $cekemail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($cekemail)) {
    $emailError = true;
    }

    if (!$password) {
      $passwordError = true;
    }

    if (strlen($password) < 8) {
      $passwordLength = true;
    }

    if ($password != $password2) {
      $confirmError = true;
    }


    echo mysqli_error($conn);
  }
}

?>


<!doctype html>
<html lang="en" id="home">
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

    <title>Registration</title>
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
              <a class="nav-link account" href="Login.php"><i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- Registration -->
    <section class="registrasi">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mx-auto">
                        <div class="row">
                            <div class="col-sm-12 my-3 account">
                                Registration
                            </div>
                        </div>

                        <!-- pesan apabila email telah digunakan  -->
                        <?php if(isset($emailError)) :?>
                          <p style="margin-inline: 60px; text-align: left; color: red; font-style: italic">Email yang anda masukan telah digunakan!</p>
                        <?php elseif(isset($passwordError)) :?>
                          <p style="margin-inline: 60px; text-align: left; color: red; font-style: italic">Password belum dimasukan!</p>
                        <?php elseif(isset($passwordLength)) :?>
                          <p style="margin-inline: 60px; text-align: left; color: red; font-style: italic">Password kurang dari 8 karakter!</p>
                        <?php elseif(isset($confirmError)) :?>
                          <p style="margin-inline: 60px; text-align: left; color: red; font-style: italic">Konfirmasi password tidak sesuai!</p>
                        <?php endif;?>
                        <!-- akhir pesan -->

                        <form action="" method="post" class="my-3 mb-5 mx-5">
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-user"></i>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" autocomplete="off">
                            </div>
                            <br>
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" autocomplete="off">
                            </div>
                            <br>
                            <div class="input birth">
                                <div class="icon">
                                  <i class="fas fa-city"></i>
                                </div>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Born in" autocomplete="off">
                            </div>
                            <br>
                            <div class="input birth">
                                <div class="icon">
                                  <i class="fas fa-calendar-alt"></i>
                                </div>
                                <input type="text" name="date" id="date" class="form-control" placeholder="Date" autocomplete="off">
                            </div>
                            <br>
                            <div class="input birth">
                                <div class="icon">
                                  <i class="fas fa-calendar-alt"></i>
                                </div>
                                <input type="text" name="month" id="month" class="form-control" placeholder="Month" autocomplete="off">
                            </div>
                            <br>
                            <div class="input birth">
                                <div class="icon">
                                  <i class="fas fa-calendar-alt"></i>
                                </div>
                                <input type="text" name="year" id="year" class="form-control" placeholder="Year" autocomplete="off">
                            </div>
                            <br>
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-phone"></i>
                                </div>
                                <input type="text" name="number" id="number" class="form-control" placeholder="Phone Number" autocomplete="off">
                            </div>
                            <br>
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-at"></i>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                            </div>
                            <br>
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                            <br>
                            <div class="input">
                                <div class="icon">
                                  <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" autocomplete="off">
                            </div>
                            <br>
                            <div class="regisPosition text-center">
                              <button type="submit" name="register" class="regisbtn">Submit</button>
                              <button type="reset" class="regisbtn">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AKhir Registration -->


    <script src="js/bootstrap.js"></script>

    <script src="js/jquery-1.js"></script>

    <script src="script.js"></script>


  </body>
</html>