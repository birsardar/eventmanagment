<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* General reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Centering the form on the page */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f6f8;
        }

        /* Form styling */
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .form-container h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        /* Input fields */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        /* Button styling */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Error message */
        .error-message {
            color: #d9534f;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Login</h1>
        <form id="login-form" method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
            <div id="error-message" class="error-message"></div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Check if user is already logged in
        if (localStorage.getItem('auth_token')) {
            window.location.href = '/dashboard';
        }

        // Handle form submission
        document.getElementById('login-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await axios.post('/api/auth/login', {
                    email: email,
                    password: password
                });

                // Store the token in local storage
                localStorage.setItem('auth_token', response.data.token);
                alert('Login successful!');
                window.location.href = '/dashboard'; // Redirect to a protected route
            } catch (error) {
                // Display error message if login fails
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = error.response ? error.response.data.message :
                    'Login failed. Please try again.';
            }
        });
    </script>
</body>

</html>
