<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];

    $sql = "INSERT INTO buku_tamu (nama, komentar) VALUES ('$nama', '$komentar')";
    
    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

$sql_select = "SELECT id, nama, komentar, tanggal FROM buku_tamu ORDER BY tanggal DESC";
$result = mysqli_query($koneksi, $sql_select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - Siber Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); }
        .hero { background: linear-gradient(135deg, #0d6efd 0%, #0099ff 100%); color: white; padding: 4rem 0; margin-bottom: 2rem; position: relative; }
        .logout-btn { position: absolute; top: 20px; right: 20px; }
    </style>
</head>
<body>

    <div class="hero">
        <div class="logout-btn">
            <span class="me-3">Halo, <strong><?php echo $_SESSION['username']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Buku Tamu Digital</h1>
            <p class="lead">Silakan tinggalkan pesan atau komentar Anda di bawah ini.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            <!-- Form Section -->
            <div class="col-lg-4">
                <div class="card p-4">
                    <h4 class="mb-4">Kirim Komentar</h4>
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="komentar" class="form-label">Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="4" required placeholder="Tulis komentar Anda..."></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- List Section -->
            <div class="col-lg-8">
                <div class="card p-4">
                    <h4 class="mb-4">Komentar Terbaru</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="20%">Nama</th>
                                    <th>Komentar</th>
                                    <th width="25%">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td class="fw-bold"><?php echo htmlspecialchars($row['nama']); ?></td>
                                            <td><?php echo nl2br(htmlspecialchars($row['komentar'])); ?></td>
                                            <td class="text-muted small"><?php echo $row['tanggal']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted italic">Belum ada komentar.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 border-top">
        <p class="text-muted small">&copy; <?php echo date('Y'); ?> Siber Project. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>