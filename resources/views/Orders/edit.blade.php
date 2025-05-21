<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 py-6">
                <form method="POST" action="{{ route('orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                        <select id="client_id" name="client_id" required class="form-select w-full rounded border-gray-300">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="branch_id" class="block text-sm font-medium text-gray-700 mb-1">Sucursal</label>
                        <select id="branch_id" name="branch_id" required class="form-select w-full rounded border-gray-300">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="total_price" class="block text-sm font-medium text-gray-700 mb-1">Precio Total</label>
                        <input type="number" step="0.01" id="total_price" name="total_price" value="{{ $order->total_price }}" required class="w-full border rounded py-2 px-3 text-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                        <select id="status" name="status" required class="form-select w-full rounded border-gray-300">
                            <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                            <option value="listo" {{ $order->status == 'listo' ? 'selected' : '' }}>Listo</option>
                            <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="delivery_type" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Entrega</label>
                        <select id="delivery_type" name="delivery_type" required class="form-select w-full rounded border-gray-300">
                            <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected' : '' }}>En local</option>
                            <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected' : '' }}>A domicilio</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="delivery_person_id" class="block text-sm font-medium text-gray-700 mb-1">Repartidor</label>
                        <select id="delivery_person_id" name="delivery_person_id" class="form-select w-full rounded border-gray-300">
                            <option value="">No asignado</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $order->delivery_person_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center space-x-3 mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Actualizar Pedido
                        </button>
                        <a href="{{ route('orders.index') }}" class="text-sm text-gray-600 hover:underline">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>