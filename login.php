<?php
require 'includes/db.php';
require 'includes/auth.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hash, $role);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['role']     = $role;
        header("Location: " . dashboardFor($role));
        exit;
    }
    $error = "Wrong username or password.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if ($error): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
        <p><input type="text" name="username" placeholder="Username" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <button type="submit">Login</button>
    </form>
</body>
</html>
