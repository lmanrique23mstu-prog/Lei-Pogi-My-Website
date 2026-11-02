<?php
require 'includes/auth.php';
requireRole(['Department Head']);
include 'includes/header.php';   // shows the signed-in user's photo
?>
<!DOCTYPE html>
<html>
<head><title>Department Head Dashboard</title></head>
<body>
    <h1>Department Head Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> (<?= htmlspecialchars($_SESSION['role']) ?>)</p>

    <!-- Put this role's features here -->

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
