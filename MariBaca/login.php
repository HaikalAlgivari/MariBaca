<?php 
    include "koneksi.php";

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = hash('sha256', $password);

        $sql = "SELECT * FROM anggota WHERE 
        username='$username' AND password='$hash_password'
        ";

        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo '<script>alert("Selamat Datang, '.$data['username'].'");
                location.href="template.php";</script>';
        } else {
            echo '<script>alert("Akun tidak ditemukan! Silahkan coba lagi.");</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login MariBaca</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet"/>
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" id="inputUser" placeholder="Username" name="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" id="inputPass" placeholder="Password" name="password" requiredrequired>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" name="login" class="btn">Login</button>
            <div class="register-link">
                <p>Belum punya akun? <a href="register.php">Daftar</a></p>
            </div>
        </form>
    </div>
</body>
</html>
