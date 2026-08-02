<?php
declare(strict_types=1);

/**
 * Archivo base para conectar PHP con Oracle usando PDO_OCI.
 *
 * Este es el primer paso del curso: crear una conexión simple.
 * Para usarlo, debes tener definidas estas variables de entorno:
 * - ORACLE_USER
 * - ORACLE_PASSWORD
 * - ORACLE_HOST
 * - ORACLE_PORT
 * - ORACLE_SERVICE
 */
function conectarOraclePdo(): \PDO
{
    $usuario = getenv('ORACLE_USER') ?: 'APP';
    $password = getenv('ORACLE_PASSWORD') ?: 'App123';
    $host = getenv('ORACLE_HOST') ?: '192.168.1.30';
    $puerto = getenv('ORACLE_PORT') ?: '1521';
    $servicio = getenv('ORACLE_SERVICE') ?: 'MATT';

    if ($password === false || trim((string) $password) === '') {
        throw new \RuntimeException(
            'Falta definir ORACLE_PASSWORD. En Windows puedes probar: set ORACLE_PASSWORD=tu_password'
        );
    }

    // DSN de PDO_OCI para una conexión sencilla.
    $dsn = sprintf('oci:dbname=//%s:%s/%s;charset=AL32UTF8', $host, $puerto, $servicio);

    return new \PDO($dsn, $usuario, $password, [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]);
}
