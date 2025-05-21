<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Ingrediente</title>
</head>
<body>
    <div class="container">
        <h1>Editar Ingrediente</h1>

        <form method="POST" action="{{ route('ingredients.update', ['ingredient' => $ingredient->id]) }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled value="{{ $ingredient->id }}">
                <div id="idHelp" class="form-text">ID del ingrediente.</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Ingrediente</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $ingredient->name }}" placeholder="Ingrese el nombre del ingrediente" required>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar Ingrediente</button>
                <a href="{{ route('ingredents.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>