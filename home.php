<?php
    include 'header.php';
    include 'db.php';

    if (isset($_SESSION['username'])) {
        echo "<h2>Selamat datang, " . $_SESSION['username'] . "!</h2>";
        echo "<p>Temukan resep-resep pilihan untuk sajian terbaik setiap hari!</p>";
        echo '<a href="list_resep.php" class="btn">Lihat Daftar Resep</a>';
    } else {
        echo "<h2>Selamat datang</h2>";
        echo "<p>Silakan login untuk melihat daftar resep atau daftar jika belum memiliki akun.</p>";
        echo '<a href="login.php" class="btn">Login</a>';
        echo '<a href="register.php" class="btn">Daftar</a>';
    }
?>

<?php include 'footer.php'; ?>
