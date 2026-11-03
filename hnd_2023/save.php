<?php
//  Collect data 
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Please submit the form first. <a href='form.html'>Go to form</a>");
}

$name    = trim($_POST["name"]    ?? "");
$email   = trim($_POST["email"]   ?? "");
$zip     = trim($_POST["zip"]     ?? "");
$country = trim($_POST["country"] ?? "");

// All data must be entered
if ($name === "" || $email === "" || $zip === "" || $country === "") {
    die("Error: All fields must be filled in. <a href='form.html'>Go back</a>");
}

// Correct standard email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email address. <a href='form.html'>Go back</a>");
}

// Each record on one line, fields separated by |
$line = $name . "|" . $email . "|" . $zip . "|" . $country . PHP_EOL;
file_put_contents("hnd2023.txt", $line, FILE_APPEND | LOCK_EX);

//  Insert data into database school
$conn = new mysqli("localhost", "root", "", "school");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO SWE (name, email, zip, country) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $zip, $country);

if ($stmt->execute()) {
    echo "Data saved successfully to the text file and the database.<br><br>";
    echo "<a href='form.html'>Back to form</a> | ";
    echo "<a href='view_file.php'>View text file data</a> | ";
    echo "<a href='view_db.php'>View database data</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
