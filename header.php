<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <a href="home.php">Beranda</a>
        <a href="list_resep.php">List Resep</a>

        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>