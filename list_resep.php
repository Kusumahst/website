<?php
    include 'header.php';
    include 'db.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $sql = "SELECT * FROM resep";
    $result = $conn->query($sql);
    ?>

    <h2>Daftar Resep Masakan</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li><a class='link' href='detail_resep.php?id="  . $row['id'] . "'>" . $row['nama_resep'] . "</a></li>";
            }
        } else {
            echo "Tidak ada resep.";
        }
        ?>
    </ul>
    <a href="home.php" class="btn">Kembali ke Home</a>

<?php
    $conn->close();
    include 'footer.php';
?>
