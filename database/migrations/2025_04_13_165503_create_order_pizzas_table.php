<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_pizzas', function (Blueprint $table) {
            $table->id(); // Columna de ID autoincremental
            $table->string('customer_name'); // Nombre del cliente
            $table->string('delivery_address'); // Dirección de entrega
            $table->decimal('total_price', 8, 2); // Precio total de la orden
            $table->string('status')->default('Pendiente'); // Estado de la orden (ej: Pendiente, En Preparación, Entregada)
            // Si tuvieras una relación con el usuario que hace la orden, iría aquí:
            // $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_pizzas');
    }
};
