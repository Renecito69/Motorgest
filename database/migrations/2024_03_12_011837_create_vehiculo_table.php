
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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 30);
            $table->string('marca', 30);
            $table->string('color', 30);
            $table->integer('modelo');
            $table->integer('cc');
            $table->integer('año');
            $table->integer('kilometraje');
            $table->string('tipo_combustible', 30);
            $table->date('ultimo_mantenimiento');
            $table->string('tipo_vehiculo', 30);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
