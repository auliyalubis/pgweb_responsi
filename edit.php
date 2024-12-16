<?php
// Mengoneksikan ke database sesuai dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yohealth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek jika ada ID yang diterima
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM faskes WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    die("ID tidak valid.");
}

// Proses form ketika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no = htmlspecialchars($_POST['no']);
    $rumah_sakit = htmlspecialchars($_POST['rumah_sakit']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $alamat = htmlspecialchars($_POST['alamat']);

    // Update data ke database
    $sql_update = "UPDATE faskes SET no='$no', rumah_sakit='$rumah_sakit', longitude='$longitude', latitude='$latitude', alamat='$alamat' WHERE ID=$id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: index.php"); // Ganti 'index.php' dengan nama file utama Anda
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Edit Data</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="no" class="form-label">No</label>
                <input type="number" class="form-control" name="no" value="<?php echo htmlspecialchars($row['no']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="rumah_sakit" class="form-label">Rumah Sakit</label>
                <input type="text" class="form-control" name="rumah_sakit" value="<?php echo htmlspecialchars($row['rumah_sakit']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" name="longitude" value="<?php echo htmlspecialchars($row['longitude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" name="latitude" value="<?php echo htmlspecialchars($row['latitude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>