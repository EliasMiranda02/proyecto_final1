let packageData = {}; // Almacenará los datos de los paquetes

    // Cargar los paquetes desde el archivo PHP
    async function loadPackages() {
      try {
        const response = await fetch('controlador/rellenar_form.php');
        const data = await response.json();

        const packageSelect = document.getElementById("packageId");

        // Iterar sobre los datos y añadir opciones al combobox
        data.forEach(package => {
          packageData[package.id] = package;
          const option = document.createElement("option");
          option.value = package.id;
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