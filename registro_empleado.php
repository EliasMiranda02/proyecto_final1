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
            <br><br>
            <form action="" method="post">

                <div class="apellidos">
                    <!-- Dato personal: Nombre -->
                    <div class="apaterno-container">
                        <label for="apaterno">Nombre</label>
                        <input type="text" name="nombre" class="apaterno" required>
                    </div>
                    <!-- El nombre de usuario -->
                    <div class="apaterno-container">
                        <label for="amaterno">Nombre de usuario</label>
                        <input type="text" name="nombre" class="apaterno" required>
                    </div>

                </div>

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

                <label for="correo">Correo electrónico</label>
                <br>
                <input type="text" name="amaterno" class="amaterno" required>

                <br><br>
                <div class="login">

                    <div class="password1">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="contraseña" class="contraseña" required>
                    </div>

                    <div class="password2">
                        <label for="contraseña">Confirma tu contraseña</label>
                        <input type="password" name="contraseña" class="contraseña" required>
                    </div>

                </div>

                <br>
            
                <label for="numero">Número de celular</label>
                <br><br>
                <Select name="opcion" class="telefonos">
                    <option value="1">961</option>
                    <option value="2">664</option>
                    <option value="3">229</option>
                    <option value="4">81</option>
                    <option value="5">33</option>
                </Select>
                
                <!-- PARA HACER QUE EN EL INPUT SOLO PERMITA NUMEROS CON UN LIMITE DE 7 -->
                <input type="text" class="numero" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    
                <br><br><br>

                <!-- NIP y Categoria del Empleado -->
                <div class="apellidos">
                    <div class="apaterno-container">
                        <label for="NIP" class="nip">NIP</label>
                        <input type="password" class="num_nip" id="numero" name="numero" pattern="^\d{1,4}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                    </div>
                    <div class="apaterno-container">
                        <label for="cargo_empleado" class="cargo_emp">Cargo del Empleado</label>
                        <br><br>
                        <select name="cargo" class="Cargos">
                            <option value="1">Administrativo</option>
                            <option value="2">Asesor de Viajes</option>
                            <option value="3">Guia Turistico</option>
                        </select>
                    </div>
                </div>

                <br>

                <!-- LUGAR PARA TERMINOS Y CONDICIONES -->
                <p>
                    <input type="checkbox" name="validar" class="validar" id="validar" required>
                    <b> Acepto los 
                    <a href="#">Términos y condiciones</a> </b>
                </p>

                <input type="submit" value="Regístrate ahora" id="submit" disabled> <!-- Botón de submit deshabilitado -->

            </form>

            <p>
                <b>
                    ¿Ya tienes cuenta? <a href="./index.php">Inica sesión</a>
                </b>
            </p>

        </div>

    </body>

</html>