<!doctype html> 
<html lang="es">
   <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Listado de Pizzas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
   <body> 
    <x-app-layout>
       <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Listado de Pizzas') }} </h2> </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
  
            <a href="{{ route('pizzas.create') }}" class="btn btn-success mb-4">{{ __('Create New pizzas')}}</a>
  
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>controls</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pizzas as $pizza)
                <tr>
                  <td>{{ $pizza->id }}</td>
                  <td>{{ $pizza->name }}</td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-primary btn-sm">Editar</a>
                      <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta pizza?')">Eliminar</button>
                      </form>
                  </div>
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
  </body> </html>