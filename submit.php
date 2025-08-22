<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = htmlspecialchars($_POST['project_name']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $brief = htmlspecialchars($_POST['brief']);
    $member1 = htmlspecialchars($_POST['member1']);
    $member2 = htmlspecialchars($_POST['member2']);
    $member3 = htmlspecialchars($_POST['member3']);
    $member4 = htmlspecialchars($_POST['member4']);
    $user_id = $_SESSION['user'];

    mysqli_query($conn, "INSERT INTO projects (user_id, project_name, start_date, end_date, member1, member2, member3, member4, project_brief) 
    VALUES ('$user_id', '$project_name', '$start_date', '$end_date', '$member1', '$member2', '$member3', '$member4', '$brief')");

    header("Location: index.php");
    exit;
}
?>
