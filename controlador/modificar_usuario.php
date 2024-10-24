<?php
    include "modelo/conexion.php";

    $id_cliente = $_GET['id_cliente'];
    $sql = $conexion->query("SELECT * FROM clientes WHERE id_cliente='$id_cliente'");

    if ($sql) {
        $datos = $sql->fetch_object();
        echo json_encode($datos);
    } else {
        echo json_encode([]);
    }
?>
