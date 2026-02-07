<?php
require 'conn.php';
include ('function.php');
$item = readPegawai();    

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ambil hash password dari database berdasarkan email menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM pegawai WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Password benar, lakukan tindakan selanjutnya (misalnya: set session, redirect, dll.)
            $iseng =  "<script>
                alert('Login Berhasil');
                document.location.href='admin.php';</script>";
            echo $iseng;
        } else {
            // Password salah
            echo "<script>alert('Password Salah')
            document.location.href='loginAdmin.php';</script>";
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan')
        document.location.href='loginAdmin.php';</script>";
    }

    
    session_start();
    $_SESSION['id_pegawai'] = $row['id_pegawai'];

    $stmt->close();
    $conn->close();
}
?>
