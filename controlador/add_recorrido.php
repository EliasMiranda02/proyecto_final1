<?php

    include "../modelo/conexion.php";



    $id_ruta = $conexion ->real_escape_string($_POST['id_ruta']);
    $fecha_salida = date('Y-m-d H:i:s', strtotime($_POST['date_salida']));
    $fecha_llegada = date('Y-m-d H:i:s', strtotime($_POST['date_llegada']));

    $precio_boleto = $conexion->real_escape_string($_POST['boleto']);
    $precio_boleto = preg_replace('/[^0-9.]/', '', $precio_boleto);

    $estado = $conexion->real_escape_string($_POST['estado']);

    $sql = "INSERT INTO recorridos (id_ruta,fecha_salida,fecha_llegada,precio_boleto,estado) 
        VALUES ('$id_ruta','$fecha_salida','$fecha_llegada','$precio_boleto','$estado')";
    
    ($conexion->query($sql));
    header('Location: ../index.php?i=recorrido&mensaje=registro_exitoso');
?>