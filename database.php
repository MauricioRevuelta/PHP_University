<?php
$username = 'root';
$password = '';
$dbname = 'university_registration';

// Create connection
$conn = new mysqli('localhost', $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful<br>";

// Table creation queries
$coursesT = "CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50),
    description TEXT,
    max_capacity INT
)";

$studT = "CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100)
)";

// Execute table creation queries
if ($conn->query($coursesT) === TRUE && $conn->query($studT) === TRUE) {
    echo "<br>Tables created";
} else {
    echo "<br>Error creating tables: " . $conn->error;
}


// Add course to the course table
$sql = "INSERT INTO courses (course_id, course_name, description, max_capacity)
        VALUES
            ('CSCI101', 'Introduction to Computer Science', 'This course provides an overview of computer science fundamentals.', 40),
            ('MATH201', 'Calculus I', 'This course covers the fundamentals of calculus.', 30),
            ('ENG101', 'English Composition', 'This course focuses on developing writing skills.', 30),
            ('HIST101', 'World History', 'This course explores major events in world history.', 30),
            ('BIO101', 'Biology Basics', 'This course covers basic concepts in biology.', 30)";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "All courses added successfully<br>";
} else {
    echo "Error adding courses: " . $conn->error;
}

// Close connection
$conn->close();
?>
