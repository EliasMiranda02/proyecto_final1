<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- TABLA DE USUARIOS -->
    <div class="col-12 p-2">
        <table class="table">
            <thead class="Bg-info">
                <tr>
                    <th scope="col">id_usuario</th>
                    <th scope="col">nombre</th>
                    <th scope="col">apellido materno</th>
                    <th scope="col">apellido paterno</th>
                    <th scope="col" class="px-3 text-center">email</th>
                    <th scope="col" class="text-center">clave_lada</th>
                    <th scope="col">telefono</th>
                    <th scope="col">fecha_registro</th>
                    <th scope="col">contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "modelo/conexion.php";

<<<<<<< HEAD
                $sql = $conexion->query("SELECT * FROM clientes");
                if ($sql->num_rows > 0) {
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?= $datos->id_cliente ?></th>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido_materno ?></td>
                            <td><?= $datos->apellido_paterno ?></td>
                            <td><?= $datos->email ?></td>
                            <td><?= $datos->clave_lada ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td><?= $datos->fecha_registro ?></td>
                            <td><?= $datos->contraseña ?></td>
                            <td>
                                <!-- Botón de eliminación que abre el modal -->
                                <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $datos->id_cliente ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                <!-- Modal de Confirmación -->
                                <div class="modal fade" id="deleteModal<?= $datos->id_cliente ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $datos->id_cliente ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?= $datos->id_cliente ?>">Confirmar Eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de que desea eliminar al usuario <strong><?= $datos->nombre ?></strong>?</p>
                                                <p>Teléfono: <?= $datos->telefono ?></p>
                                                <p>Email: <?= $datos->email ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="controlador/eliminar_usuario.php"> <!-- Cambié la acción -->
                                                    <input type="hidden" name="eliminar" value="<?= $datos->id_cliente ?>"> <!-- ID correcto -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>No se encontraron usuarios.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
=======
    <body>
        
        <div class="registro">
            <img src="./IMG/registro/Logo.png" alt="">
            <br>
            <h1><b>Crear Cuenta</b></h1>
            <?php
                include "modelo/conexion.php";
                include "controlador/registro_empleado.php";
            ?>
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
                        <input type="text" name="nombre_usuario" class="apaterno" required>
                    </div>
>>>>>>> 4e1a4a6254fabf402e4738813cb437d2fc4d74ab

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<<<<<<< HEAD
</html>
=======
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
                <input type="text" name="email" class="amaterno" required>

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
            
                <label for="numero">Número de celular</label>
                <br><br>
                <Select name="opcion" class="telefonos">
                    <option value="961">961</option>
                    <option value="664">664</option>
                    <option value="229">229</option>
                    <option value="81">81</option>
                    <option value="33">33</option>
                </Select>
                
                <!-- PARA HACER QUE EN EL INPUT SOLO PERMITA NUMEROS CON UN LIMITE DE 7 -->
                <input type="text" class="numero" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    
                <br><br><br>

                <!-- NIP y Categoria del Empleado -->
                <div class="apellidos">
                    <div class="apaterno-container">
                        <label for="NIP" class="nip">NIP</label>
                        <input type="password" class="num_nip" id="numero" name="nip" pattern="^\d{1,4}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                    </div>
                    <div class="apaterno-container">
                        <label for="cargo_empleado" class="cargo_emp">Cargo del Empleado</label>
                        <br><br>
                        <select name="cargo" class="Cargos">
                            <option value="Administrativo">Administrativo</option>
                            <option value="Asesor de Viajes">Asesor de Viajes</option>
                            <option value="Guia Turistico">Guia Turistico</option>
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

                <input type="submit" name="registrar" value="Regístrate ahora" id="submit" disabled> <!-- Botón de submit deshabilitado -->

            </form>

            <p>
                <b>
                    ¿Ya tienes cuenta? <a href="./index.php">Inica sesión</a>
                </b>
            </p>

        </div>

    </body>

</html>
>>>>>>> 4e1a4a6254fabf402e4738813cb437d2fc4d74ab
