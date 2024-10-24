<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Chiapas Viajero</title>
</head>

<body>

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
                <p>Crear Cuenta</p>
            </button>

            <dialog id="modal">
                <h2>TIPO DE USUARIO</h2>
                <hr>
                <div class="modal-buttons">
                    <button onclick="window.location.href='registro_empleado.php'">
                        Equipo de Trabajo
                    </button>
                    <button onclick="window.location.href='registro.php'">
                        Viajero
                    </button>
                </div>
                <button id="btn-cerrar-modal" class="btn-cerrar">Cerrar</button>
            </dialog>

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
