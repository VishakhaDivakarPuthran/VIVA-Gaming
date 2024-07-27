<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
            body{
                background-image: url('adminimage.avif'); 
                background-repeat: no-repeat;
                background-size: cover;
                opacity: 2;
            }
            table{
                background-color:rgb(220, 240, 280);

            }
            a{
                color: black;
                text-decoration: none;
                position: relative;
                left:1170px;
                bottom:50px;
                font-size:20px;
                display: inline-block;
            }
            </style>
</head>
<body>
        <header>
                <h1 style="text-align: center;">Contact Us</h1>
            <nav>
                <a href="form.php">LogOut</a>
            </nav>
        </header>
<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "gaming"; 
$table = "contactus";

// Columns to select
$columns = array("name", "email", "message");

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get data from the table
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output table with center alignment
    echo "<div style='text-align: center; position:relative; right:20px;'>";
    echo "<table border='1' style='margin: 100px auto;;'><tr>";
    foreach ($columns as $column) {
        echo "<th>$column</th>";
    }
    
    // Output table data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>" . $row[$column] . "</td>";
        }
        echo "<form action='process_customer.php' method='POST'>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "0 results";
} 
$conn->close();
?>
</body>
</html>