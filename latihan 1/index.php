<?php
// koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "gabut";

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = "";
$slmtdtg = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    $sql = "INSERT INTO data (nama) VALUES ('$nama')";

    if (mysqli_query($conn, $sql)) {
        $slmtdtg = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>haiii</title>
</head>
<body>
    <div class="centered-container">
        <div class="form-container">
            <?php if ($slmtdtg) { ?>
                <!-- Tampilkan pesan selamat datang jika form telah disubmit -->
                <h2>haiii <?php echo htmlspecialchars($nama); ?> cantikkk!</h2>

                <!-- Tombol Yes/No -->
                <div class="mt-3">
                    <h6>apakah kamu mencintaiku ?</h6>
                    <a href="form_baru.php" class="btn btn-primary">i love u</a>
                    <button class="btn btn-danger" onclick="return false;">g</button>
                </div>
            <?php } else { ?>
                <!-- Tampilkan form input jika belum ada submit -->
                <h2>namanya siapa nich ?</h2>
                <form method="POST" action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <button type="submit" class="btn btn-primary">kirim</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>
