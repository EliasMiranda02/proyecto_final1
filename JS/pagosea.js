document.getElementById('searchFormPagosea').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_pagosea.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Pagosea table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
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