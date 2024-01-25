<?php
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);

try {
    $pdo = new PDO(
        'mysql:host=localhost:3306;dbname=ordenadores;charset=utf8',
        'root',
        'sa',
        $opciones
    );

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $resultado = $pdo->prepare('INSERT INTO ordenador (nombre,precio) VALUES (?,?)');
    $resultado->bindParam(1, $nombre);
    $resultado->bindParam(2, $precio);
    $resultado->execute();

    // Manejo de errores en la conexión o ejecución de la consulta
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
