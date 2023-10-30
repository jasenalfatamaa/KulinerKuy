<?php

session_start();
require 'functions.php';

if (isset($_COOKIE['key1']) && isset($_COOKIE['key2'])) {
  $id = $_COOKIE['key1'];
  $email = $_COOKIE['key2'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $isidata = mysqli_fetch_assoc($result);

  if ($email === hash('sha256', $isidata['email'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: Account.php");
  exit;
}

if (isset($_POST["login"])) {
  
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

  //cek user

  if (mysqli_num_rows($result) === 1) {

    //cek password
    $isidata = mysqli_fetch_assoc($result);
    if ( password_verify($password, $isidata["password"])) {

      $_SESSION["login"] = true;

      
        setcookie('key1', $isidata['id'],);
        setcookie('key2', hash('sha256', $isidata['email']));
      
    
      header("Location: Kuliner.php");
      
      $tampil = true;
      exit;
    }

  }

$error = true;
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

    <title>Login</title>
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
              <a class="nav-link account" href=""><i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- Login -->
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mx-auto">
                        <div class="row">
                            <div class="col-sm-12 my-3 account">
                                <i class="far fa-user-circle"></i>Login
                            </div>
                        </div>

                        <!-- pesan apabila email atau password salah  -->
                        <?php if(isset($error)) :?>
                          <p style="margin-inline: 14%; text-align: left; color: red; font-style: italic">Email/Password salah</p>
                        <?php endif;?>
                        <!-- akhir pesan -->

                        <form action="" method="post" class="my-3 mb-5">
                          <div class="input">
                            <div class="icon">
                              <i class="fas fa-at"></i>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                          </div>
                          <br>
                          <div class="input">
                            <div class="icon"><i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                          </div>
                          <!-- <div class="mt-2 ms-1">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                          </div> -->
                          <br>
                          <div class="text-center">
                            <button type="submit" name="login" class="loginbtn my-4">Login</button>
                          </div>
                          <br>
                          <a href="">Forgot Password?</a><br>
                          <a href="Registration.php">Create Account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AKhir Login -->


    <script src="js/bootstrap.js"></script>

    <script src="js/jquery-1.js"></script>

    <script src="script.js"></script>


  </body>
</html>