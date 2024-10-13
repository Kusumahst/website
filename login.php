<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
    
    $sql->close();
    $conn->close();
}
?>

    <h2>Login</h2>
    <p><b>Silakan masukkan username dan password.</b></p>

    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" required> <br><br>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required> <br><br>

        <input type="submit" value="Masuk">
    </form>

    <p>Belum punya akun?</p>
    <a class="btn" href="register.php">Daftar</a>
    
<?php include 'footer.php'; ?>


