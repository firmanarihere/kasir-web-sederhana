<?php

session_start();

//Buat koneksi
$con = mysqli_connect('localhost', 'root', '', 'kasir');

//login
if (isset($_POST['login'])) {
    //inisiasi var
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($con, "SELECT * FROM `user` where username='$username' and password='$password' ");
    $count = mysqli_num_rows($check);

    if ($count > 0) {
        //Jika data ditemukan
        //login berhasil
        $_SESSION['login'] = 'True';
        header('location:index.php');
    } else {
        //Data tidak ditemukan
        //gagal login
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="login.php"        
        </script>
        ';
    }
}
