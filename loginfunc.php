<?php
require 'conn.php';
include ('function.php');
$item = readPelanggan();    

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ambil hash password dari database berdasarkan email menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM pelanggan WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        // print ($row['id_pelanggan']);
        // die();
        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Password benar, lakukan tindakan selanjutnya (misalnya: set session, redirect, dll.)
            $url = "index.php";
            $iseng =  "<script>
                alert('Login Berhasil');
                document.location.href='index.php';</script>";
            echo $iseng;
        } else {
            // Password salah
            echo "<script>alert('Password Salah');
                    document.location.href='login.php';</script>";
                  
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan');
            document.location.href='login.php';</script>";
    }

    
    session_start();
    $_SESSION['id_pelanggan'] = $row['id_pelanggan'];

    $stmt->close();
    $conn->close();
}
?>
