<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karting Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="/images/logo.png" alt="Logo" width="30"> Karting Pro
        </a>
        <button class="navbar-toggler" type="button" id="navbarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">Acerca de</a></li>
                <li class="nav-item"><a class="nav-link" href="rental.php">Reservar</a></li>
            </ul>
        </div>
    </div>
</nav>

<script type="module">
    import { setupNavbar } from "/js/navbar.js";
    setupNavbar();
</script>
