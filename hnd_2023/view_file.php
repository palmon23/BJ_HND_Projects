<?php
// (iii) Read data from hnd2023.txt and display it in an HTML table
$file = "hnd2023.txt";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data from hnd2023.txt</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #555; padding: 6px 12px; }
        th { background: #ddd; }
    </style>
</head>
<body>
<h2>Data from hnd2023.txt</h2>

<?php if (!file_exists($file)): ?>
    <p>No data yet.</p>
<?php else: ?>
    <table>
        <tr><th>Name</th><th>EMail</th><th>Zip Code</th><th>Country</th></tr>
        <?php
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $f = explode("|", $line);
            echo "<tr>";
            foreach ($f as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
<?php endif; ?>

<p><a href="form.html">Back to form</a></p>
</body>
</html>
