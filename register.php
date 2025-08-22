<?php
include 'db.php';
$message='';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        $message = "Registration successful! <a href='login.php'>Login Now</a>";
    } 
    else {
        $message = "Username already exists. ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
    <h3 class="mb-3">Register</h3>
    <form method="POST">
        <div class="mb-3">
            <input name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>
    <?php if ($message) echo "<div class='alert alert-info mt-3'>$message</div>"; ?>
</div>
</body>
</html>
