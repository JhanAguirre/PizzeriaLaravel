<!doctype html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista de empleados</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('employees') }}
          </h2>
      </x-slot>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <a href="{{ route('employees.create') }}" class="btn btn-success mb-4">{{ __('Create New employees') }}</a>

                    <table class="table">
                        <thead>
                            <tr>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Posición</th>
                                <th scope="col">Número de Identificación</th>
                                <th scope="col">Salario</th>
                                <th scope="col">Fecha de Contratación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                          <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->user_id }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->identification_number }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->hire_date }}</td>
                            </td>
                            <td>
                              <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                              <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block">
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

    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>