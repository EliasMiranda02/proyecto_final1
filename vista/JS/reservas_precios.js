const precioInput = document.getElementById("precio");
const cantidadSelect = document.getElementById("cantidad");
const totalInput = document.getElementById("total");


function formatoMoneda(valor) {
    return new Intl.NumberFormat("es-MX", {
        style: "currency",
        currency: "MXN",
        minimumFractionDigits: 2,
    }).format(valor);
}

function calcularTotal() {
    
    const precio = parseFloat(precioInput.value.replace(/[$,]/g, "")) || 0;
    const cantidad = parseInt(cantidadSelect.value) || 0;

    const total = (cantidad * 100) + precio;

    totalInput.value = formatoMoneda(total);
}

function formatearPrecio() {
    const precio = parseFloat(precioInput.value.replace(/[$,]/g, "")) || 0;
    precioInput.value = formatoMoneda(precio);
}

cantidadSelect.addEventListener("change", calcularTotal);
window.addEventListener("DOMContentLoaded", formatearPrecio);