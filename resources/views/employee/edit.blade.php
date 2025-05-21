<div class="container">
    <h1>Editar Empleado</h1>

    <form method="POST" action="{{ route('employees.update', ['id' => $employee->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $employee->id }}">
            <div id="idHelp" class="form-text">ID del empleado.</div>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-select" id="user_id" name="user_id" required>
                <option selected disabled value="">Seleccionar Usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $employee->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Posición</label>
            <select class="form-select" id="position" name="position" required>
                <option selected disabled value="">Seleccionar Posición</option>
                <option value="cajero" @if($employee->position == 'cajero') selected @endif>Cajero</option>
                <option value="administrador" @if($employee->position == 'administrador') selected @endif>Administrador</option>
                <option value="cocinero" @if($employee->position == 'cocinero') selected @endif>Cocinero</option>
                <option value="mensajero" @if($employee->position == 'mensajero') selected @endif>Mensajero</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="identification_number" class="form-label">Número de Identificación</label>
            <input type="text" class="form-control" id="identification_number" name="identification_number" placeholder="Número de identificación" value="{{ $employee->identification_number }}" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salario</label>
            <input type="number" class="form-control" id="salary" name="salary" placeholder="Salario" value="{{ $employee->salary }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="hire_date" class="form-label">Fecha de Contratación</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ $employee->hire_date }}" required>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('employees.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>