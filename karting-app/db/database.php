<?php
$databaseFile = __DIR__ . '/karting.db';

try {
    if (!file_exists($databaseFile)) {
        $pdo = new PDO("sqlite:$databaseFile");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "CREATE TABLE IF NOT EXISTS rentals (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            phone TEXT NOT NULL,
            kart_type TEXT NOT NULL,
            rental_time INTEGER NOT NULL,
            helmet INTEGER DEFAULT 0, -- Se asegura que `helmet` tenga un valor por defecto
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($query);
    } else {
        $pdo = new PDO("sqlite:$databaseFile");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch (PDOException $e) {
    die("❌ Error al conectar con la base de datos: " . $e->getMessage());
}
?>
