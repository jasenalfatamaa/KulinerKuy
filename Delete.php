<?php

require 'functions.php';

$id = $_COOKIE['key1'];

if (delete($id) > 0) {
    echo "<script>
          alert('Foto profil berhasil dihapus!');
          document.location.href = 'Account.php';
          </script>";
}
else {
    echo "<script>
          alert('Foto profil gagal dihapus!');
          document.location.href = 'Account.php';
          </script>";
}



?>