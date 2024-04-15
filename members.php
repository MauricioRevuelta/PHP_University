<?php
// Define the username and password that will be accepted
$validUserName = "MauricioR";
$validPassword = "9110";

// Define a variable to store the login message
$loginMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Assign the username and password that user enter
    //variable name inside the [] must be the same as name on the html form for each field.
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    //Check if the username and password enter matches the valid username and password
    if ($username == $validUserName && $password == $validPassword) {
        $loginMessage = "Login successfully";
    } else {
        $loginMessage ="Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link rel="stylesheet" href="./styles.css" 
    </head>
    <body>
        <header>
            <h1> PHP University</h1>
            <nav>
                <a href="./home.php">Home</a>
                <a href="./members.php">Members</a>
                <a href="./register.php">Registration</a>
                <a href="./views.php">Courses</a>
                <a href="./contact.php">Contact Us</a>
            </nav>
        </header>
        <div class="container">
            <?php echo $loginMessage; ?>
            <h2>Login</h2>
            <form method="post" action="">
                <label for="username"> Username: </label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password"> Password: </label><br>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>

    <footer>
        <nav>
            <a href="#">Student Handbook</a>
            <a href="#">Academic Calendar</a>
            <a href="#">Campus Map</a>
            <a href="#">Student Services</a>
            <a href="#">FAQs</a>
        </nav>
    </footer>
    
</html>