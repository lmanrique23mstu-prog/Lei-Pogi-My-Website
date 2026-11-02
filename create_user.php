<?php
require 'includes/db.php';            // must provide $conn (mysqli)
require 'includes/image_helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    // Upload the image first; stop if it fails
    $img = uploadUserImage($username);
    if (!$img['success']) {
        die($img['msg']);
    }

    $stmt = $conn->prepare(
        "INSERT INTO users (username, password, role) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        echo "User created. " . $img['msg'];
    } else {
        // Remove the orphan image if the insert failed (e.g. duplicate username)
        @unlink(__DIR__ . "/" . $img['path']);
        echo "Error creating user.";
    }
}
