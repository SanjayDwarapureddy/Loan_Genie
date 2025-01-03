<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "bank_documents";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert file details into the database
$stmt = $conn->prepare("INSERT INTO documents (aadhar, pan, payslip) VALUES (?, ?, ?)");

// Bind parameters
$stmt->bind_param("sss", $aadhar, $pan, $payslip);

// Get file details from $_FILES array
$aadhar = basename($_FILES["aadhar"]["name"]);
$pan = basename($_FILES["pan"]["name"]);
$payslip = basename($_FILES["payslip"]["name"]);

// Move uploaded files to a directory
$uploadDir = "uploads/";
move_uploaded_file($_FILES["aadhar"]["tmp_name"], $uploadDir . $aadhar);
move_uploaded_file($_FILES["pan"]["tmp_name"], $uploadDir . $pan);
move_uploaded_file($_FILES["payslip"]["tmp_name"], $uploadDir . $payslip);

// Execute the SQL statement
if ($stmt->execute()) {
    // Redirect to confirm.html after successful upload
    header("Location: confirm.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
