<?php

    include "../modelo/conexion.php";



    
    $modelo = $conexion->real_escape_string($_POST['modelo']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $capacidad= $conexion->real_escape_string($_POST['capacidad']);
    $estado = $conexion->real_escape_string($_POST['estado']);

    $sql = "INSERT INTO carros (modelo,precio_renta,capacidad,estado) 
        VALUES ('$modelo','$precio','$capacidad','$estado')";
    
    ($conexion->query($sql));
    header('Location: ../t_catacarros.php');
?>