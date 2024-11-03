let packageData = {}; // Almacenará los datos de los paquetes

async function loadPackages() {
  try {
      const response = await fetch('controlador/rellenar_form.php');
      const data = await response.json();

      const packageSelect = document.getElementById("packageId");

      // Limpia las opciones anteriores
      packageSelect.innerHTML = '';

      // Iterar sobre los datos y añadir opciones al combobox
      data.forEach(package => {
          packageData[package.id] = package;
          const option = document.createElement("option");
          option.value = package.id; // Asegúrate de que aquí se asigna el ID correcto
          option.textContent = package.id_paquete;
          packageSelect.appendChild(option);
      });
  } catch (error) {
      console.error("Error al cargar los paquetes:", error);
  }
}


    // Llenar los campos del formulario según el paquete seleccionado
    function fillPackageData() {
      const packageId = document.getElementById("packageId").value;
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



// ESTE CODIGO ES PARA LA TABLA 

// Inicializa el precio total
let precioTotal = 0;

// Función para actualizar el precio total en el campo correspondiente
function actualizarPrecioTotal() {
    document.getElementById('precio_total').value = precioTotal.toFixed(2); // Formato con dos decimales
}

// Evento para agregar una actividad a la tabla
document.getElementById('agregar1').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el envío del formulario

    // Obtiene los valores de los campos
    const actividad = document.getElementById('actividad').value;
    const dia = document.getElementById('dia').value;
    const hora = document.getElementById('hora').value;
    const detalle = document.getElementById('detalle').value;
    const precio = parseFloat(document.getElementById('precio').value);

    // Verifica que los campos no estén vacíos
    if (actividad === "" || dia === "" || hora === "" || detalle === "" || isNaN(precio)) {
        alert('Por favor, completa todos los campos correctamente.');
        return;
    }

    // Crea una nueva fila
    const newRow = document.createElement('tr');

    // Agrega las celdas a la nueva fila
    newRow.innerHTML = `
        <td><input type="checkbox" class="actividad-checkbox" /></td>
        <td class="text-center">${actividad}</td>
        <td class="text-center">${dia}</td>
        <td>${hora}</td>
        <td>${detalle}</td>
        <td class="text-center">${precio.toFixed(2)}</td>
    `;

    // Agrega la nueva fila al cuerpo de la tabla
    document.getElementById('itinerarioTableBody').appendChild(newRow);

    // Actualiza el precio total
    precioTotal += precio;
    actualizarPrecioTotal();

    // Limpia los campos después de agregar la actividad
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


// Antes de enviar el formulario
document.querySelector("form").addEventListener("submit", function(event) {
  const tableBody = document.getElementById("itinerarioTableBody");
  const activities = [];

  // Recorre cada fila de la tabla y almacena los datos
  Array.from(tableBody.rows).forEach(row => {
      const actividad = row.cells[1].textContent;
      const dia = row.cells[2].textContent;
      const hora = row.cells[3].textContent;
      const detalle = row.cells[4].textContent;
      const precio = parseFloat(row.cells[5].textContent);

      activities.push({ actividad, dia, hora, detalle, precio });
  });

  // Almacena todas las actividades en un campo oculto
  const activitiesField = document.createElement("input");
  activitiesField.type = "hidden";
  activitiesField.name = "activities";
  activitiesField.value = JSON.stringify(activities);
  this.appendChild(activitiesField);
});