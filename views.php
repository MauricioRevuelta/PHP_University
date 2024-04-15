<?php
include('database_connection.php');
?>

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
            <h2>Courses</h2>
            <?php
            //Display contents on the table
            $selectquery = "SELECT * FROM courses";
            $result = $dbConn->query($selectquery);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr> <th>Course ID</th> <th>Course name</th> <th>Course Description</th> <th>Course capacity</th> </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['course_id'] . "</td>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['max_capacity'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>" . "<br>";

            } else {
                echo "No rows in this table.";
            }
            ?>
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
