<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "query_form_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to insert form data into the database
$sql = "INSERT INTO queries (name, email, phone, query) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $query);

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$query = $_POST['query'];

// Execute SQL query
if ($stmt->execute() === TRUE) {
    echo "Query submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
