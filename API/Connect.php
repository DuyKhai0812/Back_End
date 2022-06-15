<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Content-Type: application/json; charset=UTF-8");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="ql_ch_ban_ns";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>