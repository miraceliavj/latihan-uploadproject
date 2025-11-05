<?php
$koneksi = mysqli_connect("localhost","root","mysql","loginregister");
    echo('Koneksi Database Berhasil');
if(mysqli_connect_error()){
    echo"koneksi database gagal :". mysqli_connect_error();
}
?>

