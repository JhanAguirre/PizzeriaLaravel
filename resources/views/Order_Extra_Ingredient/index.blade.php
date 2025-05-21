<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Ordenar Ingrediente Extra</title>
  </head>
  <body>
  <x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ingredientes Extra por Pedido') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

        <a href="{{ route('order_extra_ingredient.create') }}" class="btn btn-success mb-3">Agregar</a>
          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Pedido</th>
                <th scope="col">Ingrediente Extra</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orderExtraIngredients as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>#{{ $item->order->id }}</td>
                  <td>{{ $item->extraIngredient->name }}</td>
                  <td>{{ $item->quantity }}</td>

                 <td>
                 <a href="{{ route('order_extra_ingredient.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('order_extra_ingredient.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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