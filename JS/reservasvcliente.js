$(document).ready(function () {
    // Cargar opciones de origen al cargar la página
    $.ajax({
        url: "controlador/controlador_vuelos.php",
        type: "POST",
        data: { action: "getOrigenes" },
        success: function (response) {
            const data = JSON.parse(response);
            let options = '<option value="">Seleccione origen</option>';
            data.forEach(origen => {
                options += `<option value="${origen}">${origen}</option>`;
            });
            $("#origen").html(options);
        },
    });

    // Cambiar destinos según el origen seleccionado
    $("#origen").on("change", function () {
        const origen = $(this).val();
        $.ajax({
            url: "controlador/controlador_vuelos.php",
            type: "POST",
            data: { action: "getDestinos", origen },
            success: function (response) {
                const data = JSON.parse(response);
                let options = '<option value="">Seleccione destino</option>';
                data.forEach(destino => {
                    options += `<option value="${destino}">${destino}</option>`;
                });
                $("#destino").html(options);
                $("#numeroVuelo").val(""); // Limpiar número de vuelo
                $("#id_vuelo").val(""); // Limpiar ID vuelo
                $("#precio").val(""); // Limpiar precio
                $("#hora").val(""); // Limpiar hora
            },
        });
    });

    // Cambiar número de vuelo, llave, precio y hora según origen y destino
    $("#destino").on("change", function () {
        const origen = $("#origen").val();
        const destino = $(this).val();
        if (origen && destino) {
            $.ajax({
                url: "controlador/controlador_vuelos.php",
                type: "POST",
                data: { action: "getVuelo", origen, destino },
                success: function (response) {
                    const data = JSON.parse(response);
                    $("#numeroVuelo").val(data.numero_vuelo);
                    $("#id_vuelo").val(data.id_vuelo);
                    $("#precio").val(data.precio_vuelo);
                    $("#hora").val(data.hora_salida);
                },
            });
        }
    });
});

setTimeout(function () {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos
