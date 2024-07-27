<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaming Website Login</title>
  <style>
     body {
  font-family: Arial, sans-serif;
  background-color: #f3f3f3;
  background-image: url('game4.webp');
  color:white;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.reservation-form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.reservation-form h2 {
  margin-bottom: 20px;
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group textarea {
  height: 100px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
} body {
  font-family: Arial, sans-serif;
  background-color: #f3f3f3;
  background-image: url('game4.webp');
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.reservation-form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.reservation-form h2 {
  margin-bottom: 20px;
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group textarea {
  height: 100px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  position:relative;
  bottom:10px;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}
  </style>
</head>
<body>
<button>
        <a href="index.php">Home</a>
      </button>

  <div class="container">
    <form method="POST" action="reserve.php">
      <h2>BOOK NOW</h2>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-group">
        <label for="requirements">Special Requirements:</label>
        <textarea id="requirements" name="requirements"></textarea>
      </div>
      <button type="submit" name="submit">Register</button>
    </form>
  </div>
</body>
</html>

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "gaming";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $phoneno = $_POST['phone'];
    $date = $_POST['date']; 
    $time = $_POST['time'];
    $description = $_POST['requirements'];

    $query = "INSERT INTO booknow (name, email, phone, date, time, requirements) VALUES ('$name','$email','$phoneno','$date','$time','$description')";
    
    if(mysqli_query($con, $query)) {
        echo "<script>
                alert('Thank you for your booking.');
                location.href='index.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
?>
