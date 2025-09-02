<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "reviews_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reviews
$result = $conn->query("SELECT name, review, rating, created_at FROM reviews ORDER BY created_at DESC");

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);

$conn->close();
?>

