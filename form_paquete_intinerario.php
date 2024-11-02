<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Paquete</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <form>
      <div class="mb-3">
        <label for="packageId" class="form-label">Paquete</label>
        <select class="form-select" id="packageId" onchange="fillPackageData()">
          <option value="">Selecciona un paquete</option>
          <!-- Las opciones serán cargadas dinámicamente con JavaScript -->
        </select>
      </div>

      <div class="mb-3">
        <label for="packageNumber" class="form-label">Número de Paquete</label>
        <input type="text" class="form-control" id="packageNumber" placeholder="Número de Paquete" readonly>
      </div>

      <div class="mb-3">
        <label for="packageName" class="form-label">Nombre del Paquete</label>
        <input type="text" class="form-control" id="packageName" placeholder="Nombre del Paquete" readonly>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="destination" class="form-label">Destino</label>
          <input type="text" class="form-control" id="destination" placeholder="Destino" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label for="duration" class="form-label">Duración (días)</label>
          <input type="number" class="form-control" id="duration" placeholder="Duración en días" readonly>
        </div>
      </div>
    </form>
  </div>


  <script src="JS/form_precio.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
