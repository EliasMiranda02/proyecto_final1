let packageData = {}; // Almacenará los datos de los paquetes

// Cargar los paquetes desde el archivo PHP
async function loadPackages() {
    try {
        const response = await fetch('controlador/rellenar_form.php');
        const data = await response.json();

        const packageSelect = document.getElementById("packageId");

        // Iterar sobre los datos y añadir opciones al combobox
        data.forEach(package => {
            packageData[package.id_paquete] = package;
            const option = document.createElement("option");
            option.value = package.id_paquete; // Asigna el ID del paquete como value
            option.textContent = package.id_paquete; // Muestra el ID del paquete como texto
            packageSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error al cargar los paquetes:", error);
        alert("No se pudieron cargar los paquetes. Inténtalo de nuevo más tarde.");
    }
}

// Llenar los campos del formulario según el paquete seleccionado
function fillPackageData() {
    const packageId = document.getElementById("packageId").value;
    document.getElementById("selectedPackageId").value = packageId; // Asigna el valor al input de texto
    if (packageId && packageData[packageId]) {
        document.getElementById("packageNumber").value = packageData[packageId].numero_paquete;
        document.getElementById("packageName").value = packageData[packageId].nombre;
        document.getElementById("destination").value = packageData[packageId].destino;
        document.getElementById("duration").value = packageData[packageId].duracion_dias;
    } else {
        // Limpiar los campos si no hay selección válida
        document.getElementById("packageNumber").value = "";
        document.getElementById("packageName").value = "";
        document.getElementById("destination").value = "";
        document.getElementById("duration").value = "";
    }
}

// Llamar a la función de carga al cargar la página
document.addEventListener("DOMContentLoaded", loadPackages);


// Evento para agregar una actividad a la tabla
document.getElementById('agregar1').addEventListener('click', function(event) {
    event.preventDefault();

    const actividad = document.getElementById('actividad').value;
    const dia = document.getElementById('dia').value;
    const hora = document.getElementById('hora').value;
    const detalle = document.getElementById('detalle').value;

    if (actividad === "" || dia === "" || hora === "" || detalle === "") {
        alert('Por favor, completa todos los campos correctamente.');
        return;
    }

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td><input type="checkbox" class="actividad-checkbox" /></td>
        <td class="text-center">${actividad} <input type="hidden" name="actividad[]" value="${actividad}"></td>
        <td class="text-center">${dia} <input type="hidden" name="dia[]" value="${dia}"></td>
        <td>${hora} <input type="hidden" name="hora[]" value="${hora}"></td>
        <td class="descripcion">${detalle} <input type="hidden" name="detalle[]" value="${detalle}"></td>
    `;

    document.getElementById('itinerarioTableBody').appendChild(newRow);
    // Limpiar campos después de agregar actividad
    document.getElementById('actividad').value = '';
    document.getElementById('dia').value = '';
    document.getElementById('hora').value = '';
    document.getElementById('detalle').value = '';

});


// Evento para eliminar actividades seleccionadas
document.getElementById('eliminar1').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el envío del formulario

    const checkboxes = document.querySelectorAll('.actividad-checkbox:checked');
    
    // Verificar si hay checkboxes seleccionados
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos una actividad para eliminar.");
        return;
    }

    // Eliminar solo la fila correspondiente a cada checkbox seleccionado
    checkboxes.forEach(function(checkbox) {
        const row = checkbox.closest('tr'); // Obtiene la fila <tr> que contiene el checkbox
        if (row) {
            row.remove(); // Elimina la fila
        }
    });
});



setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos



// PARA HACER EL FORMATO MODENA Y EL SUMADO DE LOS INPUT



// Función para formatear un número a moneda mexicana
function formatCurrency(value) {
    return value.toLocaleString("es-MX", { style: "currency", currency: "MXN" });
}

// Función para convertir el valor del input a número, eliminando caracteres de formato
function parseCurrency(value) {
    return parseFloat(value.replace(/[^0-9.-]+/g, "")) || 0;
}

// Función para actualizar el total y aplicar formato de moneda
function actualizarTotal() {
    var transporte = parseCurrency(document.getElementById("transporte").value);
    var alojamiento = parseCurrency(document.getElementById("alojamiento").value);
    var actividades = parseCurrency(document.getElementById("actividades").value);
    var alimentacion = parseCurrency(document.getElementById("alimentacion").value);

    // Sumar los valores
    var total = transporte + alojamiento + actividades + alimentacion;

    // Establecer el valor del campo "precio_total" con la suma formateada
    document.getElementById("precio_total").value = formatCurrency(total);
}

// Función para formatear el campo en tiempo real al escribir
function formatInput(event) {
    const input = event.target;
    const value = parseCurrency(input.value);
    input.value = formatCurrency(value);
    actualizarTotal(); // Actualizar el total cada vez que se formatea
}

// Agregar event listeners a los inputs para que se actualice el total y el formato
document.getElementById("transporte").addEventListener("input", formatInput);
document.getElementById("alojamiento").addEventListener("input", formatInput);
document.getElementById("actividades").addEventListener("input", formatInput);
document.getElementById("alimentacion").addEventListener("input", formatInput);


// ALERTA PARA CUANDO NO HAYA DATOS EN LA TABLA CUANDO SE HAGA EL SUBMIT
document.getElementById('nuevoItinerarioForm').addEventListener('submit', function(event) {
    const tableBody = document.getElementById('itinerarioTableBody');
    
    // Verificar si la tabla está vacía
    if (tableBody.children.length === 0) {
        event.preventDefault(); // Detener el envío del formulario
        alert("La tabla de itinerario está vacía. Por favor, agrega al menos una actividad.");
    }
});

// SIDEBAR JS

document.querySelector('.menu-icon').addEventListener('click', () => {
    const nav = document.querySelector('nav');
    const overlay = document.querySelector('.overlay');

    nav.classList.toggle('open');
    overlay.classList.toggle('active');
});

document.querySelector('.overlay').addEventListener('click', () => {
    const nav = document.querySelector('nav');
    const overlay = document.querySelector('.overlay');

    nav.classList.remove('open');
    overlay.classList.remove('active');
});