<?php
    //METODO DE CONEXION USANDO PDO SERVIDOR LOCAL
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'chiapas_viajero');

    //AHORA, ESTABLECEMOS LA CONEXIÓN.
    try{
        //EJECUTAMOS LAS VARIABLES Y APLICACIONES UT8
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e){
        exit("Error: " . $e->getMessage());
    }
?>