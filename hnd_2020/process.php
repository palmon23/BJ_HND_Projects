<?php
// Get the data sent from the login form 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login    = $_POST["login"] ?? "";
    $password = $_POST["password"] ?? "";

    echo "<h2>Data received from the form</h2>";
    echo "Login: " . htmlspecialchars($login) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br><br>";
    echo "<a href='login.html'>Back to login form</a>";
} else {
    echo "No data received. <a href='login.html'>Go to the login form</a>";
}
?>
