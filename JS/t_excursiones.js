
    btnEditar.addEventListener('click', function(event) {
        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const descripcion = row.cells[2].innerText;
            const precio = row.cells[3].innerText;
            const duracion_horas = row.cells[4].innerText;
            const ubicacion = row.cells[5].innerText; // Suponiendo que la contraseña está en la columna 9
            const clasificacion = row.cells[6].innerText; // Ajusta el índice según tu tabla
            const imagen = row.cells[9].querySelector('img').src;

            // Llenar los campos del modal
            document.getElementById('id_excursion_editar').value = id;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('precio').value = precio;
            document.getElementById('duracion_horas').value = duracion_horas;
            document.getElementById('ubicacion').value = ubicacion;
            document.getElementById('clasificacion').value = clasificacion;
            document.getElementById('im').src = imagen;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
    });

    // Enviar el formulario al hacer clic en "Guardar Cambios"
    document.getElementById('confirmarEditar').addEventListener('click', function() {
        document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
    });

// Para eliminar
document.getElementById('selectAll').addEventListener('change', function() {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

// Oculta el mensaje después de 5 segundos
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos

document.getElementById('searchFormExcursion').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }

    fetch('controlador/buscar_excursion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Excursiones table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

// JS PARA HACER LA IMAGEN APAREZCA
function actualizarImg() {
    const $inputfile = document.querySelector("#selImg"),
        $imgcliente = document.querySelector("#imagen");

    // Establece la imagen por defecto al cargar
    const defaultImg = "IMG/excursion.png";
    $imgcliente.src = defaultImg;

    $inputfile.addEventListener("change", function () {
        const files = $inputfile.files;
        if (!files || !files.length) {
            // Si no hay archivos seleccionados, vuelve a la imagen por defecto
            $imgcliente.src = defaultImg;
            return;
        }

        // Si hay un archivo seleccionado, reemplaza la imagen por el archivo seleccionado
        const archivoInicial = files[0];
        const Url = URL.createObjectURL(archivoInicial);
        $imgcliente.src = Url;
    });
}
// Llamada a la función
actualizarImg();


// PARA HACER CAMBIO DE IMAGEN EN EL MODAL DE EDITAR
function actualizarImg1() {
    const $inputfile = document.querySelector("#sellImg"),
        $imgcliente = document.querySelector("#im");

    // Establece la imagen por defecto al cargar
    const defaultImg = "IMG/logoempleado1.png";
    $imgcliente.src = defaultImg;

    $inputfile.addEventListener("change", function () {
        const files = $inputfile.files;
        if (!files || !files.length) {
            // Si no hay archivos seleccionados, vuelve a la imagen por defecto
            $imgcliente.src = defaultImg;
            return;
        }

        // Si hay un archivo seleccionado, reemplaza la imagen por el archivo seleccionado
        const archivoInicial = files[0];
        const Url = URL.createObjectURL(archivoInicial);
        $imgcliente.src = Url;
    });
}
actualizarImg1();