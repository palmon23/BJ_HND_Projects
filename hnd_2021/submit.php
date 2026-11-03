<?php
// Database connection 
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "application";

// Connect to MySQL 
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Collect data
    $first_name = trim($_POST["first_name"] ?? "");
    $email      = trim($_POST["email"] ?? "");
    $subject    = trim($_POST["subject"] ?? "");
    $country    = $_POST["country"] ?? "none";
    $comment    = trim($_POST["comment"] ?? "");
    $gender     = $_POST["gender"] ?? "";
    $degrees    = $_POST["degree"] ?? "";

    // check of required fields
    if ($first_name === "" || $email === "" || $subject === "") {
        die("First name, email and subject are required.");
    }

    // Prepared statement to insert the record safely
    $stmt = $conn->prepare(
        "INSERT INTO applicants (first_name, email, subject, country, comment, gender, degree_level)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssss", $first_name, $email, $subject, $country, $comment, $gender, $degrees);

    if ($stmt->execute()) {
        echo "Record added successfully. <a href='form.html'>Back to form</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
