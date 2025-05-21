<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de Pizzas por Pedido</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Order Pizza') }}
          </h2>
      </x-slot>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
        <a href="{{ route('order_pizza.create') }}" class="btn btn-success">add</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Orden</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orderPizzas as $item)
                          <tr>
                              <th scope="row">{{ $item->id }}</th>
                              <td>{{ $item->order_id }}</td>
                              <td>{{ $item->pizza_size_name ?? 'No definido' }}</td>
                              <td>${{ number_format($item->pizza_size_price, 2) }}</td>
                              <td>{{ $item->quantity }}</td>
                              <td>
                                <a href="{{ route('order_pizza.edit', ['orderPizza' => $item->id]) }}" class="btn btn-primary btn-sm">Editar</a>                                <form action="{{ route('order_pizza.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>