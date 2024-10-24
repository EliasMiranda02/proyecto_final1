<?php
include "modelo/conexion.php"; // Asegúrate de que `$conn` esté disponible

    if(!empty($_GET["eliminar"])){
        $id=$_GET["eliminar"];

        $sql=$conexion->query("DELETE FROM cliente WHERE id_cliente==$id");

        if ($sql == 1) {
            echo "ELIMINADO";
        }
        else{
            echo "ERROR";
        }
        
        

    }
?>
