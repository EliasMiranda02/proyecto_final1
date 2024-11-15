<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/registros.css">
    <script src="./JS/registros.js" defer></script>
    <title>Chiapas Viajero</title>

</head>

<body>

    <div class="registro">

        <img src="./IMG/registro/Logo.png" alt="">
        <br>
        <h1><b>Crear Cuenta</b></h1>
        <?php
        session_start();
        include "modelo/conexion.php";
        include "controlador/registro_usuario.php";

        if (isset($_SESSION['mensaje'])) {
            echo '<p>' . $_SESSION['mensaje'] . '</p>'; // Muestra el mensaje
            unset($_SESSION['mensaje']); // Borra el mensaje de la sesión
        }
        ?>
        <!-- SECCION PARA EL NOMBRE, APELLIDOS -->
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="imagen1">
                <img id="image" src="" alt="Vista previa de la imagen" style="display: block; width: 150px; margin-top: 10px;">
                <br>
                <input type="file" id="selImg" name="selImg">
            </div>
            <br>
            <label for="nombre" class="nomb">Nombre</label>
            <br>
            <input type="text" name="nombre" class="nombre" required>
            <br><br>
            <div class="apellidos">
                <!-- Apellido paterno: el label arriba y el input abajo -->
                <div class="apaterno-container">
                    <label for="apaterno">Apellido paterno</label>
                    <input type="text" name="apaterno" class="apaterno" required>
                </div>

                <!-- Apellido materno: el label e input en la misma fila del apellido paterno -->
                <div class="amaterno-container">
                    <label for="amaterno">Apellido materno</label>
                    <input type="text" name="amaterno" class="amaterno" required>
                </div>
            </div>

            <br><br>
            <!-- SECCION PARA EL CORREO ELECTRONICO -->
            <label for="correo">Correo electrónico</label>
            <br>
            <input type="text" name="email" class="amaterno" required>

            <!-- SECCION PARA CONTRASEÑAS -->
            <br><br>
            <div class="login">

                <div class="password1">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña1" class="contraseña" required>
                </div>

                <div class="password2">
                    <label for="contraseña">Confirma tu contraseña</label>
                    <input type="password" name="contraseña2" class="contraseña" required>
                </div>

            </div>

            <br>
            <!-- SECCION PARA EL NUMERO DE CELULAR -->
            <label for="numero">Número de celular</label>
            <br><br>
            <Select name="opcion">
                <option value="961">961</option>
                <option value="664">664</option>
                <option value="229">229</option>
                <option value="81">81</option>
                <option value="33">33</option>
            </Select>

            <!-- PARA HACER QUE EN EL INPUT SOLO PERMITA NUMEROS CON UN LIMITE DE 7 -->
            <input type="text" class="numero" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">

            <br><br>

            <p>
                <input type="checkbox" name="validar" class="validar" id="validar" required>
                <b> Acepto los
                    <a href="#">Términos y condiciones</a> </b>
            </p>

            <input type="submit" name="registrar" value="Regístrate ahora" id="submit" disabled> <!-- Botón de submit deshabilitado -->

        </form>

        <p>
            <b>
                ¿Ya tienes cuenta? <a href="./index.php">Inica sesión</a>
            </b>
        </p>

    </div>

    <script>
        function actualizarImg() {
            const $inputfile = document.querySelector("#selImg"),
                $imgcliente = document.querySelector("#image");

            // Establece la imagen por defecto al cargar
            const defaultImg = "IMG/Clientes.png";
            $imgcliente.src = defaultImg;

            $inputfile.addEventListener("change", function() {
                const files = $inputfile.files;
                if (!files || !files.length) {
                    // Si no hay archivos seleccionados, vuelve a la imagen por defecto
                    $imgcliente.src = defaultImg;
                    return;
                }

                // Si hay un archivo seleccionado, reemplaza la imagen por el archivo seleccionado
                const archivoInicial = files[0];
                const Url = URL.createObjectURL(archivoInicial);
                $imgcliente.src = Url;
            });
        }
        actualizarImg();

        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>