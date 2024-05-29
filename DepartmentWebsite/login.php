<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE studentId='$studentId' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['studentId'] = $studentId;
        header("Location: profile.php");
    } else {
        echo "Invalid ID or password";
    }
}

$conn->close();
?>
