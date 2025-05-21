<!doctype html> 
<html lang="es">
   <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Listado de ingredientes</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
   <body> 
    <x-app-layout>
       <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Listado de ingredientes') }} </h2> </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <a href="{{ route('ingredients.create') }}" class="btn btn-success">Agregar ingrediente </a>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ingredients as $ingredient)
                <tr>
                  <td>{{ $ingredient->id }}</td>
                  <td>{{ $ingredient->name}}</td>
                  <td>
                    <a href="{{route('ingredients.edit',['ingredient'=>$ingredient->id])}}" class="btn btn-info">Edit</a>
                    <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" style="display: inline-block">
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
  </body> </html>