<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Pizza a Orden</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Pizza a Orden</h1>

        <form method="POST" action="{{ route('order_pizza.store') }}">
            @csrf
            <div class="mb-3">
                <label for="order_id" class="form-label">Orden</label>
                <select class="form-select" id="order_id" name="order_id" required>
                    <option value="">Seleccionar Orden</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pizza_size_id" class="form-label">Tamaño de Pizza</label>
                <select class="form-select" id="pizza_size_id" name="pizza_size_id" required>
                    <option value="">Seleccionar Tamaño</option>
                    @foreach ($pizzaSizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }} - ${{ number_format($size->price, 2) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" required min="1" class="form-control" id="quantity" name="quantity" placeholder="Cantidad de pizzas">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('order_pizza.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>