<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $dbname = "project_db";
    $conn = mysqli_connect($host,$user,$password,$dbname);

    if(!$conn) {
        echo "ERROR: ".mysqli_connect_error();
    }

?>