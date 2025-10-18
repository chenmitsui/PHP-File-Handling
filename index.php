<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $student_id = trim($_POST['student_id']);
    $course = trim($_POST['course']);

    if ($fullname && $student_id && $course) {
        $file = fopen("students.txt", "a");
        fwrite($file, "$fullname|$student_id|$course\n");
        fclose($file);
        echo "<script>alert('Registration successful!'); window.location='display.php';</script>";
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student Registration</h2>
    <form method="POST">
        <label>Full Name:</label>
        <input type="text" name="fullname" required>

        <label>Student ID:</label>
        <input type="text" name="student_id" required>

        <label>Course:</label>
        <input type="text" name="course" required>

        <button type="submit">Register</button>
        <a href="display.php">View Homepage</a>
    </form>
</div>
</body>
</html>
