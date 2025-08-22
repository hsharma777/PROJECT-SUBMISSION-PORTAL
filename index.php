<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");
$user_id = $_SESSION['user'];
$username = $_SESSION['username'];
$projects = mysqli_query($conn, "SELECT * FROM projects WHERE user_id=$user_id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
    <h4>Welcome, <?php echo htmlspecialchars($username); ?>!</h4>
    <form method="POST" action="submit.php">
        <div class="mb-3"><input name="name" class="form-control" placeholder="Project Name" required></div>
        <div class="row mb-3">
            <div class="col"><input type="date" name="start_date" class="form-control" required></div>
            <div class="col"><input type="date" name="end_date" class="form-control" required></div>
        </div>
        <div class="mb-3"><input name="members" class="form-control" placeholder="Team Members (max 4)" required></div>
        <div class="mb-3"><textarea name="brief" class="form-control" placeholder="Project Brief" required></textarea></div>
        <button class="btn btn-success w-100">Submit Project</button>
    </form>
    <h5 class="mt-4">Your Projects</h5>
    <?php while($p = mysqli_fetch_assoc($projects)): ?>
    <div class="card mb-2">
        <div class="card-body">
            <h6><?php echo htmlspecialchars($p['name']); ?></h6>
            <small><?php echo $p['start_date']." to ".$p['end_date']; ?></small><br>
            <small>Members: <?php echo htmlspecialchars($p['members']); ?></small><br>
            <p><?php echo htmlspecialchars($p['brief']); ?></p>
        </div>
    </div>
    <?php endwhile; ?>
</div>
</body>
</html>
