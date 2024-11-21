<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiapas Viajero | Reserva de Paquetes Turísticos</title>
    <link rel = "icon" type = "image/ico" href = "vista/IMG/Icono.ico"/>
    <link rel = "stylesheet" href = "vista/CSS/booking.css">
</head>
<body>
<?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info mb-3" id="mensajeAlerta">
            <?php
            if ($_GET['mensaje'] == 'registro_exitoso') {
                echo "Reserva completada exitosamente.";
            }
            ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="calendar">
            <div class="calendar-header">
                <span class="arrow" id="prevMonth">&lt;</span>
                <h2 id="monthYear"></h2>
                <span class="arrow" id="nextMonth">&gt;</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Lun</th>
                        <th>Mar</th>
                        <th>Mié</th>
                        <th>Jue</th>
                        <th>Vie</th>
                        <th>Sáb</th>
                        <th>Dom</th>
                    </tr>
                </thead>
                <tbody id="calendarBody">
                    
                </tbody>
            </table>
        </div>

        <div class="formulario">
            <form id="nuevareservapvForm" action="controlador/agregar_reservapv.php" method="post" enctype="multipart/form-data">
                <div class="header-form-container">
                    <p class="titulo">DISEÑA TU VIAJE</p>
                    <div class="fecha-container">
                        <input type="date" name="fecha" id="fecha" style="width: 110px;" readonly>
                    </div>
                </div>
                
                <label for="packageId"><b class="textoA">Paquete</b></label>
                <select name="paquete" id="paquete" onchange="fillPackageData()" required>
                    <option value="" selected disabled>Seleccione un paquete</option>
                    
                </select>
                <input type="hidden" id="selectedPackageId" name="selectedPackageId" required>

                <div class="ciudad-precio-container">
                    <div class="ciudad-salida">
                        <label for="ciudad-salidas">Salida</label>
                        <select name="ciudad-salida" id="ciudad-salida" onchange="fillPackageData1()" required>
                            <option value="" selected disabled>Seleccione una ciudad</option>
                            
                        </select>
                    </div>
                    <input type="hidden" id="selectedSalidaId" name="selectedSalidaId">
                    <input type="hidden" id="selectedSalidaNombre" name="lugar_salida">

                    <div class="precio">
                        <label for="precios">Precio</label>
                        <input type="text" id="precio" name="precio" disabled required>
                    </div>
                </div>

                <div class="fecha-hora">
                    <div>
                        <label for="fecha_salidas">Fecha</label>
                        <input type="date" id="fecha_salida" name="fecha_salida" required readonly>
                    </div>                    
          
                    <div>
                        <label for="horas">Hora</label>
                        <input type="time" id="hora" name="hora" readonly>
                    </div>
                </div>

                <div class="cantidad-precio">
                    <div>
                        <label for="cantidads">Cantidad</label>
                        <select name="cantidad" id="cantidad" required>
                            <option value="" selected disabled>Cantidad</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
          
                    <div>
                        <label for="totals">Total</label>
                        <input type="text" id="total" name="total" value="0" readonly>
                    </div>
                </div>

                <button type="submit">RESERVAR YA</button>
            </form>
        </div>
    </div>

    <script src="JS/reservaspvcliente.js"></script>
    <script src="vista/JS/reservas_calendario.js"></script>
    <script src="vista/JS/reservas_moneda.js"></script>
</body>
</html>