<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | e-Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 56px; /* To avoid overlap with the fixed navbar */
        }

        /* Navbar Styling */
        .navbar-custom {
            background: #1E3A8A;
            padding: 15px;
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-custom .nav-link {
            color: white;
            transition: color 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: #FFD700;
        }

        .navbar-custom .dropdown-menu {
            background: #1E3A8A;
            border: none;
        }

        .navbar-custom .dropdown-item {
            color: white;
        }

        .navbar-custom .dropdown-item:hover {
            background: #FFD700;
            color: black;
        }

        .navbar-custom .social-icons a {
            color: white;
            margin-left: 10px;
            font-size: 1.2rem;
        }

        .navbar-custom .social-icons a:hover {
            color: #FFD700;
        }

        .hero-section {
            background-color: white;
            color: #1E3A8A;
            text-align: center;
            padding: 80px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-bottom: 2px solid #f4f4f4;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .button-container {
            margin-top: 30px;
        }

        .btn-primary {
            background-color: #FFD700;
            border: none;
            color: black;
        }

        .btn-primary:hover {
            background-color: #FFC107;
            color: black;
        }

        footer {
            background: #1E3A8A;
            color: white;
            padding: 15px 0;
            position: sticky;
            bottom: 0;
        }

        footer p {
            margin: 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Fixed Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">e-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Contact Us</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex me-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <div class="d-flex">
                    <a href="/login" class="btn btn-outline-light me-2">Login</a>
                    <a href="/register" class="btn btn-warning">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Welcome Back to e-Shop</h1>
        <p>Discover the best deals and products tailored just for you.</p>
        <div class="button-container">
            <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2025 e-Shop. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>