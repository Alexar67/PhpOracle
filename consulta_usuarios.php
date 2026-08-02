<?php

require_once 'conexion.php';

try{
    $pdo = conectarOraclePdo();
    $sql = "SELECT * FROM SEG_USUARIO";
    $stmt = $pdo -> query($sql);

    while ($fila = $stmt -> fetch()){
        echo '<pre>';
        echo htmlspecialchars(print_r($fila, true));
        echo '</pre>';
    }

}catch(Throwable $e){
    echo $e -> getMessage();
}