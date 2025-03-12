<?php include __DIR__ . '/../src/components/header.php'; ?>

<!-- Hero Section -->
<div class="hero">
<div class="filter">
    <div>
        <h1>¡Siente la Velocidad!</h1>
        <p>Alquila un Go-Kart y compite en la mejor pista</p>
        <a href="rental.php" class="btn btn-primary btn-lg">Reservar Ahora</a>
    </div>
</div>
</div>

<!-- Modelos de Go-Karts -->
<div class="container my-5">
    <h2 class="text-center text-danger">Nuestros Go-Karts</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="images/kart1.jpg" class="card-img-top" alt="Kart modelo 1">
                <div class="card-body">
                    <h5 class="card-title">Speedster 200</h5>
                    <p class="card-text">Rápido, ligero y perfecto para principiantes.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/kart2.jpg" class="card-img-top" alt="Kart modelo 2">
                <div class="card-body">
                    <h5 class="card-title">Turbo X</h5>
                    <p class="card-text">Más potencia para los que buscan adrenalina.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/kart3.jpg" class="card-img-top" alt="Kart modelo 3">
                <div class="card-body">
                    <h5 class="card-title">GT Racer</h5>
                    <p class="card-text">Para los verdaderos pilotos profesionales.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../src/components/footer.php'; ?>
