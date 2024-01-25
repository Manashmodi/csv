<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM user_data";
$result = $conn->query($query);

$csvFileName = 'a.csv';
$csvFile = fopen($csvFileName, 'w');

fputcsv($csvFile, ['ID', 'Name', 'Age', 'Sex', 'Email', 'Phone']);

while ($row = $result->fetch_assoc()) {
    fputcsv($csvFile, [$row['id'], $row['name'], $row['age'], $row['sex'], $row['email'], $row['phone']]);
}

fclose($csvFile);
$conn->close();
echo "CSV file generated successfully: $csvFileName";
?>
