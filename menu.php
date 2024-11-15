<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Chiapas Viajero</title>
</head>

<body>
    <div id="blur-background"></div>
    
    <div class="login">
        <div class="texto">
            <br><br><br>
            <h1><b>¡BIENVENIDOS!</b></h1>

            <br><br>

            <p class="frase1">
                Es un placer recibirte en Chiapas Viajero, te <br>
                ofrecemos una experiencia única, donde <br>
                cada rincón de nuestro estado cuenta una <br>
                historia que te invitamos a descubrir.
            </p>

            <br>

            <p class="frase2">
                <b>
                    ¡Te invitamos a que te sumerjas en la magia <br>
                    de Chiapas. Tu aventura comienza aquí!
                </b>
            </p>
            <br>
            <button id="btn-abrir-modal">
                Crear Cuenta
            </button>

            <!-- Modal principal -->
            <dialog id="modal">
                <h2>TIPO DE USUARIO</h2>
                <hr>
                <div class="modal-buttons">
                    <button id="btn-equipo-trabajo">
                        Equipo de Trabajo
                    </button>
                    <button onclick="window.location.href='registro.php'">
                        Viajero
                    </button>
                </div>
                <button id="btn-cerrar-modal" class="btn-cerrar">Cerrar</button>
            </dialog>

            <div class="nips">

                <dialog id="modal-nombre">
                    <h2>Ingrese NIP</h2>
                    <p id="error-message" style="color: red; display: none;">NIP incorrecto, por favor intente de nuevo.</p>
                    <form id="form-nip">
                        <input type="text" id="nip" name="nip" placeholder="NIP" required>
                        <div class="botones">
                            <button type="submit" class="aceptar">Aceptar</button>
                            <button type="button" id="btn-cerrar-modal-nombre" class="aceptar">Cerrar</button>
                        </div>
                    </form>
                </dialog>

            </div>


        </div>

        <div class="inicio">

            <h1>Inicia Sesión</h1>
            <br><br>
            <form action="" method="POST">
                <label for="correo">Correo Electrónico</label>
                <br>
                <input type="text" name="correo" id="correo" required>
                <br><br>
                <label for="contraseña">Contraseña</label>
                <br>
                <input type="password" name="contraseña" id="contraseña" required>
                <br><br>
                <input type="submit" value="Iniciar Sesión">
            </form>

        </div>

    </div>

    <script src="JS/modal.js"></script>

</body>

</html>