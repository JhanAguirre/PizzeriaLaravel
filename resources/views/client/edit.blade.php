<div class="container">
    <h1>Editar Cliente</h1>

    <form method="POST" action="{{ route('clients.update', ['id' => $client->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $client->id }}">
            <div id="idHelp" class="form-text">ID del cliente.</div>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-select" id="user_id" name="user_id" required>
                <option selected disabled value="">Seleccionar Usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $client->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Dirección del cliente" value="{{ $client->address }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono del cliente" value="{{ $client->phone }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('clients.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>