<?php
$conn = new mysqli("localhost", "root", "", "school");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name, email, zip, country FROM SWE");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SWE Table Data</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #555; padding: 6px 12px; }
        th { background: #ddd; }
    </style>
</head>
<body>
<h2>Records in table SWE (database: school)</h2>

<table>
    <tr><th>ID</th><th>Name</th><th>EMail</th><th>Zip Code</th><th>Country</th></tr>
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["zip"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["country"]) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<p><a href="form.html">Back to form</a></p>
</body>
</html>
