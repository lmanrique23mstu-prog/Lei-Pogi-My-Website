<?php include 'includes/header.php'; ?>
<h2>Create User</h2>
<!-- enctype="multipart/form-data" is required for file uploads -->
<form method="post" action="create_user.php" enctype="multipart/form-data">
    <p><input type="text" name="username" placeholder="Username" required></p>
    <p><input type="password" name="password" placeholder="Password" required></p>
    <p>
        <select name="role" required>
            <option>Student</option>
            <option>Instructor</option>
            <option>Department Head</option>
            <option>Registrar</option>
            <option>Admin</option>
        </select>
    </p>
    <p>
        <label>Photo</label>
        <input type="file" name="imageUpload" accept="image/*" required>
    </p>
    <button type="submit">Create User</button>
</form>
