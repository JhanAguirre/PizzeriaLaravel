<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Ingrediente Extra de Pedido</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Ingrediente Extra de Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('order_extra_ingredient.update', ['id' => $orderExtraIngredient->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="order_id" class="form-label">Pedido</label>
                            <select class="form-select" id="order_id" name="order_id" required>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}" {{ $orderExtraIngredient->order_id == $order->id ? 'selected' : '' }}>
                                        #{{ $order->id }} - Cliente: {{ $order->client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="extra_ingredient_id" class="form-label">Ingrediente Extra</label>
                            <select class="form-select" id="extra_ingredient_id" name="extra_ingredient_id" required>
                                @foreach ($extraIngredients as $ingredient)
                                    <option value="{{ $ingredient->id }}" {{ $orderExtraIngredient->extra_ingredient_id == $ingredient->id ? 'selected' : '' }}>
                                        {{ $ingredient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{ $orderExtraIngredient->quantity }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('order_extra_ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>