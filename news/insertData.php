<?php

// define variables
$userName = $_POST["userName"];
$email = $_POST["email"];


// database connection 
$host = "localhost";
$dbname = "news";
$username = "jfsharron";
$password = "marie151414";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection Failed: " . mysqli_connect_error());
}

// database query
$sql = "INSERT INTO list (userName, email) VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss", $userName, $email);

mysqli_stmt_execute($stmt);

echo "Record Saved";

$stmt->close();
$conn->close();