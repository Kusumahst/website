<?php
    include 'header.php';
    include 'db.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = $conn->prepare("SELECT * FROM resep WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Resep tidak ditemukan.";
            exit();
        }
    } else {
        echo "ID resep tidak diberikan.";
        exit();
    }
?>

    <h2>Detail Resep</h2>
    <p><b>Nama: </b><?php echo $row["nama_resep"]; ?></p>
    <p><b>Bahan: </b><?php echo $row["bahan"]; ?></p>
    <p><b>Cara Pembuatan: </b><?php echo $row["cara_pembuatan"]; ?></p>

    <a href="list_resep.php" class="btn">Kembali</a>

<?php
    $sql->close();
    $conn->close();
    include 'footer.php';
?>
