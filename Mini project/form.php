<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaming Website Login</title>
  <style>
    
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f3f3f3;
  background-image: url('game3.webp');
  background-repeat: no-repeat;
  background-size: cover;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-form {
  background-color: #fff;
  padding: 50px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  opacity: 0.7;
}

.login-form h2 {
  margin-bottom: 20px;
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
  color:white;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}
button:hover {
  background-color: #0056b3;
}

a{
  text-decoration: none;
  color: white;
  position: relative;
  left: 580px;
  top: 60px;
font-size: 25px;
}
h2{
  color:white;
  text-align:center;
}
</style>
</head>

<body>
<button>
        <a href="index.php">Home</a>
      </button>

  <div class="container">
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2>Login</h2>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name="submit">Login</button>
</form>

<?php
        session_start();
        $showError = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            //Must use this as admin username and password
            if ($username === "vaishu" && $password === "vaishu2277") {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: admin.php");
                exit;
            } else {
                $showError = true;
            }
        }

        if ($showError) {
            echo "<p class='error'>Invalid username or password!</p>";
        }
        ?>
    </div>
</body>
</html>
