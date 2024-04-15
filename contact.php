<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP University</title>
        <link rel="stylesheet" href="./styles.css">
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
    <main>
        <div class="container">
            <h2>Leave us a message: </h2>
            <form method="post" action="">
                <label for="name"> Name: </label>
                <input type="text" class="footer__input" id="name" placeholder="Nick Smith" required>
                <label for="email"> Email: </label>
                <input type="email" id="email" class="footer__input" placeholder="@email.com" required/>
                <label for="message">Message:</label>  
                <textarea id="message" class="footer__input" rows="10" placeholder="Leave your message here." name="message" required></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
    </main>
    <footer>
        <nav>
            <a href="#">Student Handbook</a>
            <a href="#">Academic Calendar</a>
            <a href="#">Campus Map</a>
            <a href="#">Student Services</a>
            <a href="#">FAQs</a>
        </nav>
    </footer>
</body>
</html>
