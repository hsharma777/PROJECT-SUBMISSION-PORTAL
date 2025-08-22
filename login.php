<?php
include 'db.php';
session_start();
$message = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($res);
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['id'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $message = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
    <h3 class="mb-3">Login</h3>
    <form method="POST">
        <div class="mb-3">
            <input name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
    <?php if ($message) echo "<div class='alert alert-danger mt-3'>$message</div>"; ?>
</div>
</body>
</html>
