<?php

    include "../modelo/conexion.php";



    $marca = $conexion ->real_escape_string($_POST['marca']);
    $modelo = $conexion->real_escape_string($_POST['modelo']);
    $año_fabricacion= date('Y', strtotime($_POST['año_fabricacion']));
    $color = $conexion->real_escape_string($_POST['color']);
    $placa = $conexion->real_escape_string($_POST['placa']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $cantidad = $conexion->real_escape_string($_POST['cantidad']);
    $capacidad= $conexion->real_escape_string($_POST['capacidad']);
    $estado = $conexion->real_escape_string($_POST['estado']);

    $sql = "INSERT INTO carros (marca,modelo,año_fabricacion,color,placa,precio_renta,cantidad_dias,capacidad,estado) 
        VALUES ('$marca','$modelo','$año_fabricacion','$color','$placa','$precio','$cantidad','$capacidad','$estado')";
    
    ($conexion->query($sql));
    header('Location: ../t_catacarros.php');
?>