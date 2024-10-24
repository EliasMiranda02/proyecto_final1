<?php
    include "modelo/conexion.php";
    if(!empty($_POST["eliminar"])){

        $id= $_POST["eliminar"];

        $sql=$conexion->query("DELETE FROM clientes WHERE id_cliente == $id");
        if($sql ==1){
            echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
        }
        else{
            echo '<div class="alert alert-danger">Persona eliminada incorrectamente</div>';
        }
    }

?>