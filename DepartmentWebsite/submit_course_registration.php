<?php
session_start();

if (!isset($_SESSION['studentId'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentId = $_SESSION['studentId'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$courses = $_POST['courses'];
$classType = $_POST['classType'];

// Insert registration details into the database
foreach ($courses as $course) {
    $stmt = $conn->prepare("INSERT INTO course_registrations (studentId, year, semester, course, classType) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $studentId, $year, $semester, $course, $classType);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

echo "Course registration successful.";
?>

<!DOCTYPE html>
<html
