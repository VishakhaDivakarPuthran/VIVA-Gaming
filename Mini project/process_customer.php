<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost"; // Change this to your database server name
    $user = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "gaming"; // Change this to your database name
    $table = "booknow"; // Change this to your table name

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['accept'])) {
        $id = $_POST['id'];
        $sql = "UPDATE $table SET status='Approved' WHERE Id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> 
            alert('Record has been Approved');
            window.location.href='admin.php';
            </script>";
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST['decline'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM $table WHERE Id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> 
            alert('Record has been Rejected');
            window.location.href='admin.php';
            </script>";
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    $conn->close();
}
?>
