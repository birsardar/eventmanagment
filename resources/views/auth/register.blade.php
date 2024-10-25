<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>Register</h1>
    <form id="register-form" method="POST" action="{{ route('auth.register') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await axios.post('/api/auth/register', {
                    name: name,
                    email: email,
                    password: password
                });

                // Store the token in local storage or a cookie
                localStorage.setItem('auth_token', response.data.token);
                alert('Registration successful!');
                window.location.href = '/dashboard'; // Redirect to a protected route
            } catch (error) {
                alert('Registration failed: ' + error.response.data.message);
            }
        });
    </script>
</body>

</html>
