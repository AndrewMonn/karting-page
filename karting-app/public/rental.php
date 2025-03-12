<?php include __DIR__ . '/../src/components/header.php'; ?>
<?php include __DIR__ . '/../db/database.php'; ?>

<?php
$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $kart_type = trim($_POST["kart_type"]);
    $rental_time = intval($_POST["rental_time"]);
    $helmet = isset($_POST["helmet"]) ? 1 : 0; // ✅ Se maneja correctamente el checkbox

    if (strlen($name) < 3) {
        $errorMessage = "❌ El nombre debe tener al menos 3 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "❌ El correo electrónico no es válido.";
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        $errorMessage = "❌ El número de teléfono debe tener 10 dígitos.";
    } elseif (empty($kart_type)) {
        $errorMessage = "❌ Debes seleccionar un modelo de kart.";
    } elseif ($rental_time < 10 || $rental_time > 120) {
        $errorMessage = "❌ El tiempo de uso debe estar entre 10 y 120 minutos.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO rentals (name, email, phone, kart_type, rental_time, helmet) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $kart_type, $rental_time, $helmet]);
            $successMessage = "✅ ¡Reserva realizada con éxito!";
        } catch (PDOException $e) {
            $errorMessage = "❌ Error al guardar la reserva: " . $e->getMessage();
        }
    }
}
?>

<div class="container my-5">
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center"><?= $successMessage ?></div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger text-center"><?= $errorMessage ?></div>
    <?php endif; ?>

    <div class="form-container">
        <h2 class="text-center text-danger">Reserva tu Go-Kart</h2>
        <form id="rentalForm" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">Ingrese un número de teléfono válido (10 dígitos).</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Go-Kart</label>
                <select class="form-control" id="kart_type" name="kart_type" required>
                    <option value="">Selecciona un modelo</option>
                    <option>Speedster 200</option>
                    <option>Turbo X</option>
                    <option>GT Racer</option>
                </select>
                <div class="invalid-feedback">Debes seleccionar un modelo de kart.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tiempo de Uso (minutos)</label>
                <input type="number" class="form-control" id="rental_time" name="rental_time" min="10" max="120" required>
                <div class="invalid-feedback">Debe ser entre 10 y 120 minutos.</div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="helmet" name="helmet">
                <label class="form-check-label" for="helmet">Incluir casco de seguridad</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reservar</button>
        </form>
    </div>
</div>

<script type="module">
    import { setupFormValidation } from "/js/validations.js";
    setupFormValidation();
</script>

<?php include __DIR__ . '/../src/components/footer.php'; ?>
