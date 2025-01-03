<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "bank_loan_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = $_POST['fname'];
$spouse_name = $_POST['spouse_name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$pan = $_POST['pan'];
$aadhaar = $_POST['aadhaar'];
$annual_income = $_POST['annual_income'];
$total_experience = $_POST['total_experience'];
$field_experience = $_POST['field_experience'];
$current_loans = $_POST['current_loans'];
$emi = $_POST['emi'];
$repayment_status = $_POST['repayment_status'];
$family_members = $_POST['family_members'];
$earning_members = $_POST['earning_members'];
$assets_number = $_POST['assets_number'];
$assets_value = $_POST['assets_value'];

// Insert data into database
$sql = "INSERT INTO loan_applications (full_name, spouse_name, dob, address, pan, aadhaar, annual_income, total_experience, field_experience, current_loans, emi, repayment_status, family_members, earning_members, assets_number, assets_value)
VALUES ('$full_name', '$spouse_name', '$dob', '$address', '$pan', '$aadhaar', '$annual_income', '$total_experience', '$field_experience', '$current_loans', '$emi', '$repayment_status', '$family_members', '$earning_members', '$assets_number', '$assets_value')";

if ($conn->query($sql) === TRUE) {
    header("Location: upload.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
