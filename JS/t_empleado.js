document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
  // Escuchar el evento 'shown.bs.modal' en el modal 'eliminar'
  document.addEventListener('DOMContentLoaded', function () {
    var eliminarModal = document.getElementById('eliminar');
    eliminarModal.addEventListener('shown.bs.modal', function (event) {
      var button = event.relatedTarget; // Botón que activó el modal
      var formId = button.getAttribute('data-form-id'); // Obtener el ID del formulario
      // Asignar el ID al botón de eliminación
      var deleteButton = eliminarModal.querySelector('.btn-primary'); // Botón de eliminar
      deleteButton.setAttribute('data-form-id', formId);
    });
  });
  // Para Administradores
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Administradores table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

// Para Asesores
document.getElementById('searchFormAsesor').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Asesores table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});
document.getElementById('searchFormGuia').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Guias table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});


setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos



// ESTE PARA EL BOTON DE EDITAR
document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.getElementById('btnEditar');
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');


    btnEditar.addEventListener('click', function (event) {

        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const nombre = row.cells[2].innerText; // Asegúrate de que los índices son correctos
            const apellidoPaterno = row.cells[3].innerText;
            const apellidoMaterno = row.cells[4].innerText;
            const email = row.cells[5].innerText; // Verifica el índice
            const lada = row.cells[6].innerText;
            const numero = row.cells[7].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const pass = row.cells[9].innerText;
            const nombre_usuario = row.cells[10].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const nip = row.cells[11].innerText; // Ajusta el índice según tu tabla para el número de cédula
            const cargo = row.cells[12].innerText;
            const disponibilidad = row.cells[13].innerText;
            const imagen = row.cells[14].querySelector('img').src;

            // Llenar los campos del modal                     
            document.getElementById('id_empleado_editar').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('nombre_usuario').value = nombre_usuario;
            document.getElementById('apellido_paterno').value = apellidoPaterno;
            document.getElementById('apellido_materno').value = apellidoMaterno;
            document.getElementById('email').value = email;
            document.getElementById('pass').value = pass;
            document.getElementById('ladas').value = lada;
            document.getElementById('no_lada').value = lada;
            document.getElementById('numero').value = numero; // Cambia el ID si es diferente
            document.getElementById('nip').value = nip;
            document.getElementById('cargo').value = cargo;
            document.getElementById('cargos').value = cargo;
            document.getElementById('estados').value = disponibilidad;
            document.getElementById('estado').value = disponibilidad;
            document.getElementById('imagen').src = imagen;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
        document.getElementById('confirmarEditar').addEventListener('click', function () {
            document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.getElementById('btnEditar2');
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');


    btnEditar.addEventListener('click', function (event) {

        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const nombre = row.cells[2].innerText; // Asegúrate de que los índices son correctos
            const apellidoPaterno = row.cells[3].innerText;
            const apellidoMaterno = row.cells[4].innerText;
            const email = row.cells[5].innerText; // Verifica el índice
            const lada = row.cells[6].innerText;
            const numero = row.cells[7].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const pass = row.cells[9].innerText;
            const nombre_usuario = row.cells[10].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const nip = row.cells[11].innerText; // Ajusta el índice según tu tabla para el número de cédula
            const cargo = row.cells[12].innerText;
            const disponibilidad = row.cells[13].innerText;
            const imagen = row.cells[14].querySelector('img').src;

            // Llenar los campos del modal                     
            document.getElementById('id_empleado_editar').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('nombre_usuario').value = nombre_usuario;
            document.getElementById('apellido_paterno').value = apellidoPaterno;
            document.getElementById('apellido_materno').value = apellidoMaterno;
            document.getElementById('email').value = email;
            document.getElementById('pass').value = pass;
            document.getElementById('ladas').value = lada;
            document.getElementById('no_lada').value = lada;
            document.getElementById('numero').value = numero; // Cambia el ID si es diferente
            document.getElementById('nip').value = nip;
            document.getElementById('cargo').value = cargo;
            document.getElementById('cargos').value = cargo;
            document.getElementById('estados').value = disponibilidad;
            document.getElementById('estado').value = disponibilidad;
            document.getElementById('imagen').src = imagen;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
        document.getElementById('confirmarEditar').addEventListener('click', function () {
            document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.getElementById('btnEditar3');
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');


    btnEditar.addEventListener('click', function (event) {

        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const nombre = row.cells[2].innerText; // Asegúrate de que los índices son correctos
            const apellidoPaterno = row.cells[3].innerText;
            const apellidoMaterno = row.cells[4].innerText;
            const email = row.cells[5].innerText; // Verifica el índice
            const lada = row.cells[6].innerText;
            const numero = row.cells[7].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const pass = row.cells[9].innerText;
            const nombre_usuario = row.cells[10].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const nip = row.cells[11].innerText; // Ajusta el índice según tu tabla para el número de cédula
            const cargo = row.cells[12].innerText;
            const disponibilidad = row.cells[13].innerText;
            const imagen = row.cells[14].querySelector('img').src;

            // Llenar los campos del modal                     
            document.getElementById('id_empleado_editar').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('nombre_usuario').value = nombre_usuario;
            document.getElementById('apellido_paterno').value = apellidoPaterno;
            document.getElementById('apellido_materno').value = apellidoMaterno;
            document.getElementById('email').value = email;
            document.getElementById('pass').value = pass;
            document.getElementById('ladas').value = lada;
            document.getElementById('no_lada').value = lada;
            document.getElementById('numero').value = numero; // Cambia el ID si es diferente
            document.getElementById('nip').value = nip;
            document.getElementById('cargo').value = cargo;
            document.getElementById('cargos').value = cargo;
            document.getElementById('estados').value = disponibilidad;
            document.getElementById('estado').value = disponibilidad;
            document.getElementById('imagen').src = imagen;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
        document.getElementById('confirmarEditar').addEventListener('click', function () {
            document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
        });
    });
});
function showTable(tableId) {
    // Oculta todas las tablas
    document.querySelectorAll('.table-container').forEach(function (table) {
        table.style.display = 'none';
    });

    // Muestra la tabla correspondiente al botón que se clickeó
    document.getElementById(tableId).style.display = 'block';
}

// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Oculta todas las tablas al cargar la página
    document.querySelectorAll('.table-container').forEach(function (table) {
        table.style.display = 'none';
    });

    // Opcional: Mostrar solo una tabla por defecto
    // Si quieres que "Administradores" se muestre al cargar:
    showTable('Administradores');
});

function actualizarImg() {
    const $inputfile = document.querySelector("#sellImg"),
        $imgcliente = document.querySelector("#image");

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
// Llamada a la función
actualizarImg();

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
