<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Relación Pizza-Ingrediente</title>
</head>
<body>
<div class="container">
    <h1>Editar Relación Pizza-Ingrediente</h1>

    <form method="POST" action="{{ route('pizza_ingredient.update', ['pizzaIngredient' => $pizzaIngredient->id]) }}">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled value="{{ $pizzaIngredient->id }}">
            <div id="idHelp" class="form-text">ID de la relación.</div>
        </div>

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select class="form-select" id="pizza_id" name="pizza_id" required>
                <option value="">Seleccione una pizza</option>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizzaIngredient->pizza_id == $pizza->id ? 'selected' : '' }}>{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ingredient_id" class="form-label">Ingrediente</label>
            <select class="form-select" id="ingredient_id" name="ingredient_id" required>
                <option value="">Seleccione un ingrediente</option>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ $pizzaIngredient->ingredient_id == $ingredient->id ? 'selected' : '' }}>{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar Relación</button>
            <a href="{{ route('pizza_ingredient.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>