<!doctype html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de employee</title>
  </head>
  <body>
    <div class="container">
        <h1>Agregar Empleado</h1>
    
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
    
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option selected disabled value="">Seleccionar Usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="position" class="form-label">Posición</label>
                <select class="form-select" id="position" name="position" required>
                    <option selected disabled value="">Seleccionar Posición</option>
                    <option value="cajero">Cajero</option>
                    <option value="administrador">Jefe</option>
                    <option value="cocinero">Chef</option>
                    <option value="mensajero">Mesero</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="identification_number" class="form-label">Número de Identificación</label>
                <input type="text" class="form-control" id="identification_number" name="identification_number" required>
            </div>
    
            <div class="mb-3">
                <label for="salary" class="form-label">Salario</label>
                <input type="number" class="form-control" id="salary" name="salary" step="0.01" required>
            </div>
    
            <div class="mb-3">
                <label for="hire_date" class="form-label">Fecha de Contratación</label>
                <input type="date" class="form-control" id="hire_date" name="hire_date" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Crear Empleado</button>
        </form>
    </div>
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>