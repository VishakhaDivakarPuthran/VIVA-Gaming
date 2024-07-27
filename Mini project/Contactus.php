<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Contactusstyle.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('contactus.jpeg'); 
    background-repeat: no-repeat;
    background-size: cover;
}

header {
    color: black;
    text-align: center;
    padding: 20px 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    color:white;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    height: 150px;
}

.btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    left:260px;
}

.btn:hover {
    background-color: #45a049;
}

a{
    color: black;
    text-decoration: none;
}

</style>

<body>
    <header>
        <h1>Contact Us</h1>
        <a href="index.php">Home</a>
    </header> 

    <section class="contact">
        <div class="container">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>

        </div>
    </section>

    <?php
if(isset($_POST['submit']))
{
    error_reporting(1);
    include("config.php");
    
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $message = $_POST['message']; 


   $query = "INSERT INTO contactus (name, email, message) 
   VALUES ('$name', '$email', '$message')";
       
   mysqli_query($con, $query) or die(mysqli_error($con));
    
    echo "<script> 
            alert('Thankyou for your Response');
            location.href='Contactus.php';
        </script>";
}
?>    

</body>
</html>
