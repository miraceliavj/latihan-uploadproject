<?php
include 'koneksi.php';

if (isset($_POST['Registrasi'])) {
    $Username = $_POST['Username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, nama_lengkap)
              VALUES ('$Username', '$Password', '$nama_lengkap')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                window.location.href='login.php';
              </script>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Registrasi</h1>
            <p>Isi form ini untuk membuat akun baru.</p>
            <hr>

            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="Username" id="Username" required>
            <br>

            <label for="Password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" id="Password" required>
            <br>

            <label for="nama_lengkap"><b>Nama Lengkap</b></label>
            <input type="text" placeholder="Enter Nama Lengkap" name="nama_lengkap" id="nama_lengkap" required>
            <br>

            <button type="submit" name="Registrasi">Register</button>
        </div>
        <div>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </form>
</body>
</html>
