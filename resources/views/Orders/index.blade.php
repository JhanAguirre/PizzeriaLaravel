<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Pedidos</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Orders') }}
          </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Agregar Pedido</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Sucursal</th>
                                <th scope="col">Precio Total</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tipo de Entrega</th>
                                <th scope="col">Repartidor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        @if ($order->client && $order->client->user)
                                            {{ $order->client->user->name }}
                                        @else
                                            Cliente no asignado
                                        @endif
                                    </td>
                                    <td>{{ $order->branch->name }}</td>
                                    <td>{{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ ucfirst($order->delivery_type) }}</td>
                                    <td>
                                        @if ($order->deliveryPerson && $order->deliveryPerson->user)
                                            {{ $order->deliveryPerson->user->name }}
                                        @else
                                            Repartidor no asignado
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.edit', ['id' => $order->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->links() }} <!-- Paginación -->
                </div>
            </div>
        </div>
      </div>
    </x-app-layout>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>