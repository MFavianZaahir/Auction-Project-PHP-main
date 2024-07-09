<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='signup.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='signup.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "insert into client (username, password, role) 
        value ('" . $username . "','" . md5($password) . "','user')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan akun');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan akun');location.href='signup.php';</script>";
        }
    }
}
?>