<?php
require 'includes/auth.php';
requireRole(['Registrar']);
include 'includes/header.php';   // shows the signed-in user's photo
?>
<!DOCTYPE html>
<html>
<head><title>Registrar Dashboard</title></head>
<body>
    <h1>Registrar Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> (<?= htmlspecialchars($_SESSION['role']) ?>)</p>

    <!-- Put this role's features here -->

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
