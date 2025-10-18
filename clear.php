<?php
if (isset($_POST['clear'])) {
    file_put_contents("students.txt", ""); // Clears all content
    echo "<script>alert('All student records cleared!'); window.location='index.php';</script>";
}
?>
