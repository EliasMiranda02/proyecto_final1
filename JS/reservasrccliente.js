let packageData = {}; // Almacenará los datos de los paquetes

// Cargar los paquetes desde el archivo PHP
async function loadPackages() {
    try {
        const response = await fetch('controlador/rellenar_form_reservarc.php');
        const data = await response.json();

        const packageSelect = document.getElementById("modelo");

        // Iterar sobre los datos y añadir opciones al combobox
        data.forEach(package => {
            packageData[package.id_carro] = package;
            const option = document.createElement("option");
            option.value = package.id_carro; // Asigna el ID del paquete como value
            option.textContent = package.modelo; // Muestra el nombre del paquete como texto
            packageSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error al cargar los paquetes:", error);
        alert("No se pudieron cargar los paquetes. Inténtalo de nuevo más tarde.");
    }
}

// Llenar los campos del formulario según el paquete seleccionado
function fillPackageData() {
    const packageId = document.getElementById("modelo").value;
    document.getElementById("selectedPackageId").value = packageId; // Asigna el valor al input oculto de ID del paquete
    if (packageId && packageData[packageId]) {
        document.getElementById("capacidad").value = packageData[packageId].capacidad; // Muestra el precio del paquete
        document.getElementById("precio").value = packageData[packageId].precio_renta; // Muestra el precio del paquete
    } else {
        // Limpiar los campos si no hay selección válida
        document.getElementById("capacidad").value = "";
        document.getElementById("precio").value = "";
    }
}
document.addEventListener("DOMContentLoaded", function () {
    loadPackages();
});

setTimeout(function () {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos