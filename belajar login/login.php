<?php
include 'koneksi.php';

if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Cek apakah username ada di database
    $query = "SELECT * FROM users WHERE username = '$Username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($Password, $row['password'])) {
            echo "<script>
                    alert('Login berhasil! Selamat datang, {$row['nama_lengkap']}');
                    window.location.href='dashboard.php';
                  </script>";
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Login</h1>
            <hr>
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="Username" id="Username" required>
            <br>
            <label for="Password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" id="Password" required>
            <br>
            <button type="submit" name="Login">Login</button>
            <p>Belum punya akun? <a href="register.php">Registrasi</a></p>
        </div>
    </form>
</body>
</html>
