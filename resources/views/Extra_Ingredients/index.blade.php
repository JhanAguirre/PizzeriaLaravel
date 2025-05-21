<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Listado de Extra Ingredients</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Extra Ingredients') }}
          </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('extra_ingredients.create') }}" class="btn btn-success mb-3">Agregar</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">created_at</th>
                                <th scope="col">updated_at</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($extra_ingredients as $ingredient)
                          <tr>
                              <td>{{ $ingredient->id }}</td>
                              <td>{{ $ingredient->name }}</td>
                              <td>{{ $ingredient->price }}</td>
                              <td>{{ $ingredient->created_at }}</td>
                              <td>{{ $ingredient->updated_at }}</td>
                              <td>
                              <a href="{{ route('extra_ingredients.edit', ['id' => $ingredient->id]) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('extra_ingredients.destroy', $ingredient->id) }}" method="POST" style="display: inline-block">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>