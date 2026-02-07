<?php
require 'conn.php';

if (isset($_POST["submit"])) {
    $nama = $_POST["nama_pelanggan"];
    $kontak = $_POST["kontak_pelanggan"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Cek duplikasi email menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM pelanggan WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email Sudah Dipakai');</script>";
    } else {
        // Insert pengguna baru menggunakan prepared statement
        $stmt = $conn->prepare("INSERT INTO pelanggan (nama_pelanggan, kontak_pelanggan, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $kontak, $email, $hashed_password);
        if ($stmt->execute()) {
            echo "<script>
                alert('Berhasil Ditambahkan');
                document.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>alert('Gagal Menambahkan Data');</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="assets/images/ligi.png" rel="icon">
</head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">PHP Mysql Login using Cookie and Session</h1>
    <div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Register</h2>
            <p>Buatlah Akunmu!</p>
        </div>
        <form action="#" method="post" role="form" id="form-add" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required value"">
            </div>
            <div class="mb-3">
                <label for="kontak_pelanggan" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="kontak_pelanggan" name="kontak_pelanggan" required value"">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required value"">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value"">
            </div>
            <div>
                <p>Sudah Punya Akun?</p>
                <a href=login.php>Login</a>
            </div>
            <br>

            <button type="submit" class="btn btn-primary text-white" name="submit" id="submit" form="form-add">Buat Akun</button>
        </form>

        
        <p class="botto-text"> by Cairocoders</p>
    </div>
</div>
<style>
body#LoginForm{ background-image:url("img/bgblur.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}
 
.form-heading { color:#fff; font-size:23px;text-align:center;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}
 
.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: blue;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}

.register a {
  color: blue;
  font-size: 14px;
  text-decoration: underline;
}

.register {
  text-align: left; margin-bottom:3px;
}

.don {
  text-align: left; margin-bottom:3px;
}


</style>
</body>
</html>