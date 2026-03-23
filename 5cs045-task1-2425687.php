<?php
// Database connection details
$host = "localhost";
$dbname = "books";
$username = "2425687";   
$password = "ManUnited123#";       

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch data
    $sql = "SELECT * FROM books";
    $stmt = $conn->query($sql);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Book List</h2>

<table>
    <tr>
        <th>Book Name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of Release</th>
    </tr>

    <?php
    // Display data in table
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['book_name'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>£" . $row['price'] . "</td>";
        echo "<td>" . date("d/m/Y", strtotime($row['release_date'])) . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>