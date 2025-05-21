<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Relaciones Pizza-Ingrediente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Relaciones Pizza-Ingrediente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('pizza_ingredient.create') }}" class="btn btn-success">Agregar relacion </a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pizza</th>
                            <th>Ingrediente</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pizzaIngredients as $pizzaIngredient)
                            <tr>
                                <td>{{ $pizzaIngredient->id }}</td>
                                <td>{{ $pizzaIngredient->pizza_nombre }}</td>
                                <td>{{ $pizzaIngredient->ingredient_nombre }}</td>
                                <td>
                                    <a href="{{route('pizza_ingredient.edit',['pizzaIngredient'=>$pizzaIngredient->id])}}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('pizza_ingredient.destroy', $pizzaIngredient->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this employee?') }}')">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>