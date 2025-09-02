<?php
// Database connection details
$servername = "localhost";   // stays localhost in XAMPP
$username   = "root";        // default user
$password   = "";            // default password is empty
$dbname     = "reviews_db";  // <-- your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name   = $_POST['name'];
$review = $_POST['message']; // your textarea has name="message"
$rating = $_POST['rating'];

// Prepare and execute SQL
$stmt = $conn->prepare("INSERT INTO reviews (name, review, rating) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $review, $rating);

if ($stmt->execute()) {
    // Redirect back to homepage
    header("Location: index.html");
    exit();
} else {
    echo "Error inserting review: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>

