<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('id_producto')->unique();
        $table->string('codigo_barras');
        $table->text('descripcion');
        $table->string('nombre_producto');
        $table->string('categoria');
        $table->string('id_familiar');
        $table->string('id_linea_web');
        $table->decimal('stock', 8, 3);
        $table->decimal('precio_publico', 10, 2);
        $table->decimal('precio_cliente', 10, 2);
        $table->decimal('cantidad', 8, 3);
        $table->decimal('descuento', 8, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
