<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap JS, Popper.js, dan jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 56px; /* Adjusted to accommodate the fixed navbar */
        }

        .navbar {
            background-color: #343a40; /* Dark background color */
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* White text color */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* White color for the toggler icon */
        }

        /* Optional: Add more custom styles based on your preferences */
    </style>
    <title>Your Page Title</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="index.php">
    <i class="bi bi-bag-fill"></i>
    Grosir
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">
                        <i class="bi bi-person-fill"></i> Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">
                        <i class="bi bi-cart"></i> Belanja
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="addproduk.php">Tambah Produk</a>
                        <a class="dropdown-item" href="home.php">Data Produk</a>
                        <a class="dropdown-item" href="kategori.php">Kategori Produk</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="logout.php" method="post">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="bi bi-door-closed-fill"></i> Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Your page content goes here -->
</body>
</html>
