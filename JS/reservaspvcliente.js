let packageData = {}; // Almacenará los datos de los paquetes

// Cargar los paquetes desde el archivo PHP
async function loadPackages() {
    try {
        const response = await fetch('controlador/rellenar_form_reservapv.php');
        const data = await response.json();

        const packageSelect = document.getElementById("paquete");

        // Iterar sobre los datos y añadir opciones al combobox
        data.forEach(package => {
            packageData[package.id_paquete] = package;
            const option = document.createElement("option");
            option.value = package.id_paquete; // Asigna el ID del paquete como value
            option.textContent = package.nombre; // Muestra el nombre del paquete como texto
            packageSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error al cargar los paquetes:", error);
        alert("No se pudieron cargar los paquetes. Inténtalo de nuevo más tarde.");
    }
}

// Llenar los campos del formulario según el paquete seleccionado
function fillPackageData() {
    const packageId = document.getElementById("paquete").value;
    document.getElementById("selectedPackageId").value = packageId; // Asigna el valor al input oculto de ID del paquete
    if (packageId && packageData[packageId]) {
        document.getElementById("precio").value = packageData[packageId].precio_aproximado; // Muestra el precio del paquete
    } else {
        // Limpiar los campos si no hay selección válida
        document.getElementById("precio").value = "";
    }
}

let packageData1 = {}; // Almacenará los datos de los paquetes

// Cargar los paquetes desde el archivo PHP
async function loadPackages1() {
    try {
        const response = await fetch('controlador/rellenar_form_reservapvciudad.php');
        const data = await response.json();

        const packageSelect = document.getElementById("ciudad-salida");

        // Iterar sobre los datos y añadir opciones al combobox
        data.forEach(package => {
            packageData1[package.id_salida] = package;
            const option = document.createElement("option");
            option.value = package.id_salida; // Asigna el ID del paquete como value
            option.textContent = package.salida; // Muestra el nombre del paquete como texto
            packageSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error al cargar los paquetes:", error);
        alert("No se pudieron cargar los paquetes. Inténtalo de nuevo más tarde.");
    }
}

// Llenar los campos del formulario según el paquete seleccionado
function fillPackageData1() {
    const packageSelect = document.getElementById("ciudad-salida");
    const packageId = packageSelect.value;
    const selectedOption = packageSelect.options[packageSelect.selectedIndex].text; // Captura el texto visible

    // Asignar valores a los campos correspondientes
    document.getElementById("selectedSalidaId").value = packageId; // ID de la salida
    document.getElementById("selectedSalidaNombre").value = selectedOption; // Nombre de la ciudad

    if (packageId && packageData1[packageId]) {
        document.getElementById("hora").value = packageData1[packageId].hora; // Muestra la hora
    } else {
        document.getElementById("hora").value = "";
    }
}
document.addEventListener("DOMContentLoaded", function () {
    loadPackages();
    loadPackages1();
});
setTimeout(function () {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos
