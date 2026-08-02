<?php

require_once 'conexion.php';

try{
    $pdo = conectarOraclePdo();
    $sql = "SELECT * FROM SEG_USUARIO";
    $stmt = $pdo -> query($sql);

    while ($fila = $stmt -> fetch()){
        echo $fila['ID_USUARIO'];
    }

}catch(Throwable $e){
    echo $e -> getMessage();
}