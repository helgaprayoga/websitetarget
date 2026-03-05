<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 text-center">
    <div class="alert alert-success">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </div>
    <a href="logout.php" class="btn btn-secondary">Logout</a>
</body>
</html>