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
            Schema::create('order_pizza_pizza', function (Blueprint $table) {
                $table->id();
                // Clave foránea para la tabla 'order_pizzas'
                $table->foreignId('order_pizza_id')->constrained('order_pizzas')->onDelete('cascade');
                // Clave foránea para la tabla 'pizzas'
                $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade');
                $table->integer('quantity')->default(1); // Opcional: si quieres cantidad de cada pizza en la orden
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('order_pizza_pizza');
        }
    };