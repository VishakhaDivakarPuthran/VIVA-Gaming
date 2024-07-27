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
            a{
                color: black;
                text-decoration: none;
                position: relative;
                left:1150px;
                bottom:80px;
                font-size:25px;
                display: inline-block;
                border-radius: 5px;
            }
            table{
                background-color:rgb(220, 240, 280);
                position: relative;
                bottom:150px;
            }
            h1{
                position: relative;
                top:30px;
            }
            .btn{
                    font-weight:bold;
                    position: relative;
                    top:320px;
                    left:520px;
                    display: inline-block;
                    border-radius: 5px;
                    background-color: #ff7f50;
            }
    </style>
</head>
<body>


    <header>
        <div class="container">
            <h1 style="text-align: center;">Gaming Room Booking Details</h1>
            <br>
            <a href="Contactusinfo.php" class="btn">Contact Us Queries</a>
            <br>
            <nav>
                <a href="form.php">LogOut</a>
            </nav>
        </div>
    </header>

<?php
// Database connection parameters
$host = "localhost"; // Change this to your database server name
$user = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "gaming"; // Change this to your database name
$table = "booknow"; // Change this to your table name

// Columns to select
$columns = array("name", "email", "phone", "date", "time", "requirements");

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
    echo "<div style='text-align: center;'>";
    echo "<table border='1' style='margin: 100px auto;'><tr>";
    foreach ($columns as $column) {
        echo "<th>$column</th>";
    }
    echo "<th>Action</th>";
    echo "</tr>";
    
    // Output table data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>" . $row[$column] . "</td>";
        }
        echo "<td>";
        echo "<form action='process_customer.php' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $row['id']."'>";
        echo "<button type='submit' name='accept'>Accept</button>";
        echo "<button type='submit' name='decline'>Decline</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
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

