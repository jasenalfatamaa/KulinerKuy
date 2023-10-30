<?php

session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: Login.php");
}

if (isset($_POST["logout"])) {
  session_unset();
  session_destroy();

  setcookie('key1', '', time() - 3600);
  setcookie('key2', '', time() - 3600);

  header("Location: Login.php");
}

if (isset($_COOKIE['key1']) && isset($_COOKIE['key2'])) {
  $id = $_COOKIE['key1'];
  $email = $_COOKIE['key2'];

  $users = query("SELECT * FROM users WHERE id = $id")[0];
}

if (isset($_POST["save"])) {
  if ( profilpic($_POST) > 0 ) {
    echo "<script>
          alert('Foto profil berhasil di ubah!');
          document.location.href = 'Account.php';
          </script>";
  }
  else {
    echo "<script>
          alert('Foto profil gagal di ubah!');
          document.location.href = 'Account.php';
          </script>";
  }
}

// if (isset($_POST["login"])) {
//   login($_POST);
  
//   echo
// }

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

    <title>Account</title>
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
          <form class="d-flex ms-auto my-2">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
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

    <!-- Account -->
    <section class="account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mx-auto mb-5">
                        <div class="row">
                            <div class="col-sm-12 mb-3">

                              <?php if ( !$users["picture"] ) :?>
                                <div class="account text-center">
                                  <i class="fas fa-user-circle"></i>
                                </div>
                              <?php else :?>
                                <div class="profilepic text-center">
                                  <img class="rounded-circle" src="Profilepic/<?= $users["picture"] ?>" alt="<?= $users["picture"] ?>">
                                </div>
                              <?php endif;?>

                              <div class="text-center">
                                <?php if ( !$users["picture"] ) :?>
                                  <a href="" data-bs-toggle="modal" data-bs-target="#profilPicture">
                                    Add Profil Picture
                                  </a>
                                <?php else :?>
                                  <a href="" data-bs-toggle="modal" data-bs-target="#profilPicture">
                                    Change Profil Picture
                                  </a>
                                  <?php endif; ?>
                                <div class="modal fade" id="profilPicture" tabindex="-1" aria-labelledby="profilPictureLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="profilPictureLabel">Change Profil Picture</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <input type="file" name="img" id="img" class="form-control" placeholder="Image" required>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="modalbtn " data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="save"class="modalbtn ">Save</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <?php if ( !$users["picture"] ) :?>
                                <?php else :?>
                                  <a href="Delete.php" onclick="return confirm('apakah anda yakin ingin mengahapus foto profil?');">
                                    Delete Profil Picture
                                  </a>
                                  <?php endif;?>
                              </div>
                              <br>
                              <hr>
                            </div>
                        </div>
                        <a href="ChangeProfil.php">
                          <div class="profile">
                            Change Profile
                          </div>
                        </a>
                        <form action="" method="post" class="my-3 mb-5 mx-5">
                            <div class="input">
                                <div class="label">
                                    Full Name
                                </div>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $users["name"] ?>" readonly>
                            </div>
                            <div class="input">
                                <div class="label">
                                    Email
                                </div>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $users["email"] ?>" readonly>
                            </div>
                            <div class="input">
                                <div class="label">
                                    Phone Number
                                </div>
                                <input type="text" name="number" id="number" class="form-control" value="<?= $users["number"] ?>" readonly>
                            </div>
                            <div class="input">
                                <div class="label">
                                    Born in
                                </div>
                                <input type="text" name="place" id="place" class="form-control" value="<?= $users["city"] ?>" readonly>
                            </div>
                            <div class="input">
                                <div class="label">
                                    Date of Birth
                                </div>
                                <input type="text" name="date" id="date" class="form-control" value="<?= $users["date"].", ".$users["month"]." ".$users["year"] ?>" readonly>
                            </div>
                            <br>
                            <br>
                            <div class="regisPosition text-center">
                              <button type="submit" name="logout" class="logoutbtn">Logout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Account -->


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