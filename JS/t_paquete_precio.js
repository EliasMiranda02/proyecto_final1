setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos

document.getElementById('searchFormpp').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_pp.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#pp table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});