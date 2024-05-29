<?php
session_start();

if (!isset($_SESSION['studentId'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cs_department";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentId = $_SESSION['studentId'];
$sql = "SELECT * FROM students WHERE studentId='$studentId'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <header class="logo">
            <nav>
                <img src="https://i.pinimg.com/736x/e5/9a/10/e59a109c0a4e54f3e8622058936a1ce1.jpg" alt="AAU Logo">
                <h1 class="cncs">College of Natural and Computational Sciences</h1>
            </nav>
        </header>
        <section>
            <h2>Profile</h2>
            <div>
                <img src="uploads/<?php echo $user['profilePicture']; ?>" alt="Profile Picture" width="100">
                <p>Name: <?php echo $user['name']; ?></p>
                <p>Student ID: <?php echo $user['studentId']; ?></p>
                <p>Department: <?php echo $user['department']; ?></p>
                <p>Year: <?php echo $user['year']; ?></p>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Addis Ababa University. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
