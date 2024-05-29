document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username && password) {
            // Perform login (actual implementation should call a backend API)
            sessionStorage.setItem('loggedIn', 'true');
            sessionStorage.setItem('username', username);
            showUserContent();
        } else {
            alert('Please enter both username and password.');
        }
    });

    function showUserContent() {
        const coursesSection = document.getElementById('courses');
        const userProfileSection = document.getElementById('user-profile');
        const profileInfo = document.getElementById('profileInfo');

        // Fetch user info (in a real scenario, you'd fetch this from the server)
        const user = JSON.parse(sessionStorage.getItem('user'));

        if (user) {
            profileInfo.innerHTML = `
                <p><strong>ID:</strong> ${user.student_id}</p>
                <p><strong>Name:</strong> ${user.name}</p>
                <img src="${user.picture}" alt="Profile Picture" style="width: 150px; height: 150px;">
            `;
        }

        coursesSection.style.display = 'block';
        userProfileSection.style.display = 'block';
    }

    if (sessionStorage.getItem('loggedIn') === 'true') {
        showUserContent();
    }
});
