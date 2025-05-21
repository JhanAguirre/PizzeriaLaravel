<div class="container">
    <h1>Editar Pizza en Orden</h1>

    <form method="POST" action="{{ route('order_pizza.update', ['orderPizza' => $orderPizza->id]) }}">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $orderPizza->id }}">
            <div id="idHelp" class="form-text">ID del registro de Pizza en Orden.</div>
        </div>

        <div class="mb-3">
            <label for="order_id" class="form-label">Orden</label>
            <select class="form-select" id="order_id" name="order_id" required>
                <option selected disabled value="">Seleccionar Orden</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" @if($orderPizza->order_id == $order->id) selected @endif>{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pizza_size_id" class="form-label">Tamaño de Pizza</label>
            <select class="form-select" id="pizza_size_id" name="pizza_size_id" required>
                <option selected disabled value="">Seleccionar Tamaño</option>
                @foreach ($pizzaSizes as $size)
                    <option value="{{ $size->id }}" @if($orderPizza->pizza_size_id == $size->id) selected @endif>{{ $size->size }} - ${{ number_format($size->price, 2) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" required min="1" class="form-control" id="quantity" placeholder="Cantidad de pizzas" name="quantity" value="{{ $orderPizza->quantity }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('order_pizza.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>