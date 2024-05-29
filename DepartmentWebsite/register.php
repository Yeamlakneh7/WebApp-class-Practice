<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "university"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['studentId'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $profilePicture = $_FILES['profilePicture'];

    // Validate inputs
    if (empty($studentId) || empty($name) || empty($password) || empty($profilePicture)) {
        echo "All fields are required.";
        exit;
    }

    // Validate profile picture
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = pathinfo($profilePicture['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo "Please upload a valid image file (jpg, jpeg, png, gif).";
        exit;
    }

    // Save profile picture
    $uploadDir = 'uploads/';
    $filePath = $uploadDir . basename($profilePicture['name']);
    if (!move_uploaded_file($profilePicture['tmp_name'], $filePath)) {
        echo "Failed to upload profile picture.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (studentId, name, password, profilePicture) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $studentId, $name, $hashedPassword, $filePath);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
