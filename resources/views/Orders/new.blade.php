<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nuevo Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Nuevo Pedido</h1>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente</label>
                <select class="form-select" id="client_id" name="client_id">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->user->name }}</option>
                    @endforeach
                </select>
            </div>

            

            
            <div class="mb-3">
                <label for="branch_id" class="form-label">Sucursal</label>
                <select class="form-select" id="branch_id" name="branch_id" required>
                    <option value="">Seleccionar Sucursal</option>
                    @if(isset($branches))
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="pizza_size_id" class="form-label">Tamaño de Pizza</label>
                <select class="form-select" id="pizza_size_id" name="pizza_size_id" required>
                    <option value="">Seleccionar Tamaño</option>
                    @foreach ($pizzaSizes as $pizzaSize)
                        <option value="{{ $pizzaSize->id }}">{{ $pizzaSize->size }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="total_price" class="form-label">Precio Total</label>
                <input type="number" step="0.01" required class="form-control" id="total_price" name="total_price" placeholder="Precio total del pedido">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" id="status" name="status">
                    <option value="pendiente">Pendiente</option>
                    <option value="en_preparacion">En Preparación</option>
                    <option value="listo">Listo</option>
                    <option value="entregado">Entregado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="delivery_type" class="form-label">Tipo de Entrega</label>
                <select class="form-select" id="delivery_type" name="delivery_type">
                    <option value="en_local">En Local</option>
                    <option value="a_domicilio">A Domicilio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="delivery_person_id" class="form-label">Repartidor (Opcional)</label>
                <select class="form-select" id="delivery_person_id" name="delivery_person_id">
                    <option value="">Seleccionar Repartidor</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->user->name ?? 'Sin Nombre' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                <a href="{{ route('orders.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>