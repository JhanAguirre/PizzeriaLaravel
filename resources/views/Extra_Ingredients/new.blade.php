<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Agregar Ingrediente Extra</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Ingrediente Extra</h1>

        <form method="POST" action="{{ route('extra_ingredients.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="name" name="name" placeholder="Nombre del ingrediente extra">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" required step="0.01" class="form-control" id="price" name="price" placeholder="Precio del ingrediente extra">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('extra_ingredients.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>