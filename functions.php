<?php

$conn = mysqli_connect("localhost", "root", "", "kulinerkuy_dtbase");


function registrasi($data) {
    global $conn;

    $name = stripslashes($data["name"]);
    $address = $data["address"];
    $city = stripslashes($data["city"]);
    $date = stripslashes($data["date"]);
    $month = stripslashes($data["month"]);
    $year = stripslashes($data["year"]);
    $number = stripslashes($data["number"]);
    $email = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek email

    $cekemail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($cekemail)) {
        
        return false;
    }

    //cek password diisi atau tidak

    if (!$password) {

        return false;

    }

    //cek panjang password

    if (strlen($password) < 8) {
        
        return false;
        
    }

    //cek konfirmasi password

    if ($password != $password2) {
        // echo "<script>
        //         alert('Konfirmasi password tidak sesuai!');
        //     </script>";

        return false;
    }

    //ekripsi password

    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan user baru ke database

    mysqli_query($conn, "INSERT INTO users(name, address, city, date, month, year, number, email, password, picture) VALUES('$name', '$address', '$city', '$date', '$month', '$year', '$number', '$email', '$password', '')");

    return mysqli_affected_rows($conn);

}




function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}




function add($data) {
    global $conn;

    $id = $_COOKIE["key1"];

    $users = query("SELECT * FROM users WHERE id = $id")[0];

    $Rname = htmlspecialchars($data["Rname"]);
    $category = htmlspecialchars($data["category"]);
    $location = htmlspecialchars($data["location"]);
    $image = htmlspecialchars($data["img"]);
    $review = htmlspecialchars($data["review"]);
    $creator = $users["name"];

    $query = "INSERT INTO restaurants(name, location, review, category, image, creator) VALUES('$Rname','$location','$review','$category','$image', '$creator')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}





function search($keyword) {
    global $conn;

    $query = "SELECT * FROM restaurants WHERE name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR location LIKE '%$keyword%'";

    return query($query);
}




function change($data) {
    global $conn;

    $id = $data["id"];
    $name = stripslashes($data["name"]);
    $address = $data["address"];
    $city = stripslashes($data["city"]);
    $date = stripslashes($data["date"]);
    $month = stripslashes($data["month"]);
    $year = stripslashes($data["year"]);
    $number = stripslashes($data["number"]);
    $email = stripslashes($data["email"]);

    $query = "UPDATE users SET name = '$name', address = '$address', city = '$city', date = '$date', month = '$month', year = '$year', number = '$number', email = '$email' WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function profilpic($data) {
    global $conn;

    $id = $_COOKIE['key1'];
    $picture = upload();

    if (!$picture) {
        return false;
    }

    $query = "UPDATE users SET picture = '$picture' WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function upload() {
    global $conn;

    $filename = $_FILES['img']['name'];
    $filesize = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpname = $_FILES['img']['tmp_name'];

    if ($error === 4) {
        echo "<script>
          alert('Tidak ada foto yang dimasukan!');
          </script>";
          return false;
    }

    $ekstensivalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $filename);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensivalid)) {
        echo "<script>
          alert('file yang anda masukan bukan gambar!');
          </script>";
          return false;
    }

    move_uploaded_file($tmpname, 'Profilepic/'.$filename);

    return $filename;
}





function delete($id) {
    global $conn;

    $query = "UPDATE users SET picture = false WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}





function edit($data) {
    global $conn;

    $id = $data["id"];
    $Rname = htmlspecialchars($data["Rname"]);
    $category = htmlspecialchars($data["category"]);
    $location = htmlspecialchars($data["location"]);
    $image = htmlspecialchars($data["img"]);
    $review = htmlspecialchars($data["review"]);

    $query = "UPDATE restaurants SET name = '$Rname', category = '$category', location = '$location', image = '$image', review = '$review'  WHERE id = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



// function login($data) {
//     global $conn;

//     $email = $data["email"];
//     $password = $data["password"];

//     $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

//   //cek user

//   if (mysqli_num_rows($cekuser) === 1) {

//     //cek password
//     $isidata = mysqli_fetch_assoc($cekuser);
//     if ( password_verify($password, $isidata["password"])) {

//       $_SESSION["login"] = true;
    
//       header("Location: Kuliner.php");
      
//       $tampil = true;
//       exit;
//     }

//   }
  
//   $error = true;
// }




?>