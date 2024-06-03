<?php
session_start();

if (!isset($_SESSION['studentId'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Course Registration</title>
    <script>
        function updateCourses() {
            const year = document.getElementById('year').value;
            const semester = document.getElementById('semester').value;
            const courses = {
                "1": {
                    "1": ["C++ Programming", "Introduction to Computer Science", "Anthropology"],
                    "2": ["C++ Programming", "Introduction to Computer Science", "Anthropology"]
                },
                "2": {
                    "1": ["Object Oriented Programming", "Database Systems", "Networking", "Discrete Math"],
                    "2": ["Object Oriented Programming", "Database Systems", "Networking", "Discrete Math"]
                },
                "3": {
                    "1": ["Web Development", "Computer Graphics", "Algorithm Analysis"],
                    "2": ["Web Development", "Computer Graphics", "Algorithm Analysis"]
                },
                "4": {
                    "1": ["Computer Architecture", "Mobile App Development", "Operating Systems"],
                    "2": ["Computer Architecture", "Mobile App Development", "Operating Systems"]
                }
            };

            const courseList = document.getElementById('courses');
            courseList.innerHTML = '';

            if (year && semester) {
                courses[year][semester].forEach(course => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'courses[]';
                    checkbox.value = course;
                    checkbox.id = course;

                    const label = document.createElement('label');
                    label.htmlFor = course;
                    label.appendChild(document.createTextNode(course));

                    const br = document.createElement('br');

                    courseList.appendChild(checkbox);
                    courseList.appendChild(label);
                    courseList.appendChild(br);
                });
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <header class="logo">
            <nav>
                <img src="https://i.pinimg.com/736x/e5/9a/10/e59a109c0a4e54f3e8622058936a1ce1.jpg" alt="AAU Logo">
                <h1 class="cncs">College of Natural and Computational Sciences</h1>
                <ul class="headerContents">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <h2>Course Registration</h2>
            <form action="submit_course_registration.php" method="post">
                <label for="year">Academic Year:</label>
                <select id="year" name="year" onchange="updateCourses()" required>
                    <option value="">Select Year</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Fourth Year</option>
                </select>
                <br><br>

                <label for="semester">Semester:</label>
                <select id="semester" name="semester" onchange="updateCourses()" required>
                    <option value="">Select Semester</option>
                    <option value="1">Semester One</option>
                    <option value="2">Semester Two</option>
                </select>
                <br><br>

                <div id="courses">
                    <!-- Courses will be dynamically added here based on year and semester selection -->
                </div>
                <br>

                <label for="classType">Class Type:</label>
                <select id="classType" name="classType" required>
                    <option value="online">Online</option>
                    <option value="inperson">In Person</option>
                </select>
                <br><br>

                <button type="submit">Register</button>
            </form>
        </section>
        <footer>
            <p>&copy; 2024 Addis Ababa University. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
