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

// Inicializa el precio total
let precioTotal = 0;

// Función para actualizar el precio total en el campo correspondiente
function actualizarPrecioTotal() {
    document.getElementById('precio_total').value = precioTotal.toFixed(2); // Formato con dos decimales
}

// Evento para agregar una actividad a la tabla
document.getElementById('agregar1').addEventListener('click', function(event) {
    event.preventDefault();

    const actividad = document.getElementById('actividad').value;
    const dia = document.getElementById('dia').value;
    const hora = document.getElementById('hora').value;
    const detalle = document.getElementById('detalle').value;
    const precio = parseFloat(document.getElementById('precio').value);

    if (actividad === "" || dia === "" || hora === "" || detalle === "" || isNaN(precio)) {
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
        <td class="text-center">${precio.toFixed(2)} <input type="hidden" name="precio[]" value="${precio.toFixed(2)}"></td>
    `;

    document.getElementById('itinerarioTableBody').appendChild(newRow);
    precioTotal += precio;
    actualizarPrecioTotal();

    // Limpiar campos después de agregar actividad
    document.getElementById('actividad').value = '';
    document.getElementById('dia').value = '';
    document.getElementById('hora').value = '';
    document.getElementById('detalle').value = '';
    document.getElementById('precio').value = '';
});

// Evento para eliminar actividades seleccionadas
document.getElementById('eliminar1').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el envío del formulario

    const checkboxes = document.querySelectorAll('.actividad-checkbox:checked');
    let precioEliminado = 0;

    checkboxes.forEach(checkbox => {
        // Encuentra la fila correspondiente al checkbox seleccionado
        const row = checkbox.closest('tr');
        // Obtiene el precio de la celda correspondiente
        const precioCelda = parseFloat(row.cells[5].textContent);
        // Suma el precio a eliminar
        precioEliminado += precioCelda;
        // Elimina la fila de la tabla
        row.remove();
    });

    // Actualiza el precio total
    precioTotal -= precioEliminado;
    actualizarPrecioTotal();
});
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos
