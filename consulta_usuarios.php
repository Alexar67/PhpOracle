<?php

require_once 'conexion.php';

try{
    $pdo = conectarOraclePdo();
    $sql = "SELECT * FROM SEG_USUARIO";
    $stmt = $pdo -> query($sql);

    // Obtener todas las filas (útil para pequeñas consultas)
    $filas = $stmt->fetchAll();

    if (!$filas) {
        echo '<p>No hay registros.</p>';
    } else {
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        // Cabeceras usando las claves de la primera fila
        echo '<tr>';
        foreach (array_keys($filas[0]) as $col) {
            echo '<th>' . htmlspecialchars($col) . '</th>';
        }
        echo '</tr>';

        // Filas de datos
        foreach ($filas as $fila) {
            echo '<tr>';
            foreach ($fila as $val) {
                echo '<td>' . htmlspecialchars((string) $val) . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    }

} catch (Throwable $e) {
    echo '<p>Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
 