<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | e-Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .split-screen {
            display: flex;
            min-height: 100vh;
        }

        /* Left Panel */
        .left-panel {
            flex: 1;
            background: linear-gradient(to bottom right, #1E3A8A, #3B82F6);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .left-panel h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .left-panel p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .left-panel a {
            color: #FFD700;
            font-weight: bold;
            text-decoration: none;
        }

        /* Right Panel */
        .right-panel {
            flex: 1;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .login-card p {
            text-align: center;
            margin-bottom: 20px;
            color: #6c757d;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #3B82F6;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #1E3A8A;
        }

        .forgot-password {
            font-size: 0.9rem;
            color: #3B82F6;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .register-link {
            font-size: 0.9rem;
            color: #3B82F6;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="split-screen">
        <!-- Left Panel -->
        <div class="left-panel">
            <h1>Welcome Back to e-Shop</h1>
            <p>Sign in to access your personalized shopping experience</p>
            <p>New to e-Shop? <a href="/register">Register Here</a></p>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <div class="login-card">
                <h2>Sign In</h2>
                <p>Enter your credentials to continue</p>
                <form action="/login" method="POST">
                    @csrf <!-- For Laravel CSRF protection -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="/password/reset" class="forgot-password">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
                <p class="mt-3 text-center">Don't have an account? <a href="/register" class="register-link">Register</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const passwordFieldType = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = passwordFieldType;
        }
    </script>
</body>

</html>