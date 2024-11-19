// ESTE PARA EL BOTON DE EDITAR
btnEditar.addEventListener('click', function(event) {
        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const nombre_hotel = row.cells[2].innerText;
            const direccion = row.cells[3].innerText;
            const clave_lada = row.cells[4].innerText;
            const telefono = row.cells[5].innerText;
            const correo_electronico = row.cells[6].innerText; // Suponiendo que la contraseña está en la columna 9
            const numero_habitaciones = row.cells[7].innerText; // Ajusta el índice según tu tabla
            const descripcion = row.cells[8].innerText;
            const precio_noche = row.cells[9].innerText.replace('$', '').trim(); 
            const calificacion = row.cells[10].innerText;
            const imagen = row.cells[11].querySelector('img').src;

            // Llenar los campos del modal
            document.getElementById('id_hotel_editar').value = id;
            document.getElementById('nombre_hotel').value = nombre_hotel;
            document.getElementById('direccion').value = direccion;
            document.getElementById('clave_lada').value = clave_lada;
            document.getElementById('telefono').value = telefono;
            document.getElementById('correo_electronico').value = correo_electronico;
            document.getElementById('numero_habitaciones').value = numero_habitaciones;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('precio_noche').value = formatMoneda(precio_noche);
            document.getElementById('calificacion').value = calificacion;
            document.getElementById('imagen').src = imagen;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
    });

// Enviar el formulario al hacer clic en "Guardar Cambios"
document.getElementById('confirmarEditar').addEventListener('click', function () {
    document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
});
// Función para formatear el número como moneda
function formatMoneda(valor) {
    const numero = parseFloat(valor.replace(',', '')) || 0; // Eliminar comas y convertir a número
    return new Intl.NumberFormat('es-MX', {
        style: 'currency',
        currency: 'MXN',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(numero); // Formato con 2 decimales
}

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

document.getElementById('searchFormHotel').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_hotel.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Hoteles table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

// JS PARA HACER LA IMAGEN APAREZCA
function actualizarImg() {
    const $inputfile = document.querySelector("#selImg"),
        $imgcliente = document.querySelector("#image");

    // Establece la imagen por defecto al cargar
    const defaultImg = "IMG/hotel.png";
    $imgcliente.src = defaultImg;

    $inputfile.addEventListener("change", function() {
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
    const $inputfile = document.querySelector("#selllImg"),
        $imgcliente = document.querySelector("#imagen");

    // Establece la imagen por defecto al cargar
    const defaultImg = "IMG/logoempleado1.png";
    $imgcliente.src = defaultImg;

    $inputfile.addEventListener("change", function() {
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