<?php
require_once 'conexion.php';

try {
    // Paso 1: abrir la conexión.
    $pdo = conectarOraclePdo();

    echo '<h2>Conexión exitosa</h2>';

    // Paso 2: ejecutar una consulta básica.
    $sql = "SELECT
                SYS_CONTEXT('USERENV', 'DB_NAME') AS base_datos,
                SYS_CONTEXT('USERENV', 'INSTANCE') AS instancia,
                SYS_CONTEXT('USERENV', 'SESSION_USER') AS usuario_sesion
            FROM dual";

    $stmt = $pdo->query($sql);
    $resultado = $stmt->fetch();

    echo '<pre>';
    print_r($resultado);
    echo '</pre>';
} catch (Throwable $e) {
    echo '<h3>Error</h3>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
}