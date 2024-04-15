<?php
include('database_connection.php');

// Fetch course data (names only) from the database
$result_courses = mysqli_query($dbConn, "SELECT course_name FROM courses");

// Define variables and set to empty values
$nameErr = $emailErr = $courseErr = "";
$name = $email = $course = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Validate name
    if (empty($name)) {
        $nameErr = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Validate selected course
    if (empty($course)) {
        $courseErr = "Please select a course";
    } else {
        // Check if selected course has available slots
        $result_capacity = mysqli_query($dbConn, "SELECT max_capacity FROM courses WHERE course_name='$course'");
        if ($result_capacity) {
            $row_capacity = mysqli_fetch_assoc($result_capacity);
            if ($row_capacity['max_capacity'] <= 0) {
                $courseErr = "Selected course is full";
            }
        } else {
            $courseErr = "Invalid course selected";
        }
    }

    // If all validations pass, insert student's information into students table
    if (empty($nameErr) && empty($emailErr) && empty($courseErr)) {
        // Insert student's information into students table
        $query = mysqli_query($dbConn, "INSERT INTO students (Name, Email) VALUES ('$name', '$email')");
        if ($query) {
            echo "<script>alert('Student registered successfully!!')</script>";
            // Update course's capacity in courses table
            mysqli_query($dbConn, "UPDATE courses SET max_capacity = max_capacity - 1 WHERE course_name='$course'");
        } else {
            echo "<script>alert('Error registering student!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
    <div class="container">
        <h2>Registration Form</h2>
        <form method="post" action="">
            <label for="name">Enter your Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            <span class="error"><?php echo $nameErr; ?></span><br>
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $emailErr; ?></span><br>
            <label for="course">Course:</label>
            <select name="course">
                <option value="">Select a course</option>
                <?php
                if ($result_courses->num_rows > 0) {
                    while($row = $result_courses->fetch_assoc()) {
                        echo "<option value='" . $row["course_name"] . "'>" . $row["course_name"] . "</option>";
                    }
                }
                ?>
            </select>
            <span class="error"><?php echo $courseErr; ?></span><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</body>
</html>
