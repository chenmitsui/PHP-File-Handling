<?php
// Handle clear request
if (isset($_POST['clear'])) {
    file_put_contents("students.txt", "");
    echo "<script>alert('All student records cleared!'); window.location='home.php';</script>";
    exit();
}

// Read student records
$students = [];
if (file_exists("students.txt")) {
    $lines = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($fullname, $student_id, $course) = explode("|", $line);
        $students[] = [
            'fullname' => $fullname,
            'student_id' => $student_id,
            'course' => $course
        ];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Registered Students</h2>

    <?php if (empty($students)): ?>
        <p>No student records found.</p>
    <?php else: ?>
        <?php foreach ($students as $student): ?>
            <div style="border-bottom: 1px solid #ccc; margin-bottom:10px; padding-bottom:10px;">
                <h3>Welcome! <?php echo htmlspecialchars($student['fullname']); ?></h3>
                <p><strong>Student ID:</strong> <?php echo htmlspecialchars($student['student_id']); ?></p>
                <p><strong>Course:</strong> <?php echo htmlspecialchars($student['course']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="POST">
        <button type="submit" name="clear" class="clear-btn">Clear All Records</button>
    </form>
    <a href="register.php">Go to Registration</a>
</div>
</body>
</html>
