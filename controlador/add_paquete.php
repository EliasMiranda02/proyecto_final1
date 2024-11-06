<?php

    include "../modelo/conexion.php";

    $numeros = $conexion->real_escape_string($_POST['numero']);
    $nombre = $conexion->real_escape_string($_POST['nombres']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $precio_aproximado = $conexion->real_escape_string($_POST['precios']);
    $duracion_horas = $conexion->real_escape_string($_POST['duracion']);
    $destino = $conexion->real_escape_string($_POST['destino']); 

    $sql = "INSERT INTO paquetes (numero_paquete,nombre,descripcion,precio_aproximado,duracion_dias,destino,fecha_creacion,fecha_modificacion) 
        VALUES ('$numeros','$nombre','$descripcion','$precio_aproximado','$duracion_horas','$destino',NOW(),NOW())";
    
    ($conexion->query($sql));
    header('Location: ../t_paquetes.php?mensaje=registro_exitoso');
?>