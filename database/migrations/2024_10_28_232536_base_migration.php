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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();  // Crea una columna 'id' BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->date('fecha_contratacion');
            $table->string('titulo', 100)->nullable();  // Se puede dejar como null si no se proporciona
            $table->string('diploma', 100)->nullable(); // Se puede dejar como null si no se proporciona
            $table->binary('ante_penales_policia')->nullable(); // Permitir valores nulos para almacenar archivos PDF
            $table->binary('copia_dpi')->nullable(); // Permitir valores nulos para almacenar archivos PDF
            $table->string('nombre_conyuge', 100)->nullable(); // Se puede dejar como null
            $table->date('fecha_nacimiento_conyuge')->nullable(); // Se puede dejar como null
            $table->string('nombre_hijo', 100)->nullable(); // Se puede dejar como null
            $table->date('fecha_nacimiento_hijo')->nullable(); // Se puede dejar como null
            $table->blob('foto_empleado')->nullable(); // Columna para la foto del empleado
            $table->timestamps(); // Esto crea 'created_at' y 'updated_at'
        });

        Schema::create('expediente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->text('detalles');
            $table->timestamps();
        });

        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->text('descripcion');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_compra');
            $table->timestamps();
        });

        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_otorgamiento');
            $table->timestamps();
        });

        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->string('tipo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });

        Schema::create('liquidacion_laboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_liquidacion');
            $table->timestamps();
        });

        Schema::create('nomina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->decimal('salario', 10, 2);
            $table->date('fecha_pago');
            $table->timestamps();
        });

        Schema::create('planilla_aguinaldo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomina_id')->constrained('nomina');
            $table->decimal('monto', 10, 2);
            $table->timestamps();
        });

        Schema::create('planilla_bono_14', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomina_id')->constrained('nomina');
            $table->decimal('monto', 10, 2);
            $table->timestamps();
        });

        Schema::create('poliza_contables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomina_id')->constrained('nomina');
            $table->text('detalles');
            $table->timestamps();
        });

        Schema::create('articulos_venta', function (Blueprint $table) {
            $table->id('articulo_id'); // Auto-incremental por defecto
            $table->string('nombre_articulo', 255);
            $table->string('categoria', 100);
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad_disponible');
            $table->date('fecha_disponibilidad');
            $table->string('enlace_imagen', 255)->nullable(); // Agregado enlace_imagen
            $table->timestamps(); // Agrega created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poliza_contables');
        Schema::dropIfExists('planilla_bono_14');
        Schema::dropIfExists('planilla_aguinaldo');
        Schema::dropIfExists('nomina');
        Schema::dropIfExists('liquidacion_laboral');
        Schema::dropIfExists('permiso');
        Schema::dropIfExists('prestamo');
        Schema::dropIfExists('compra');
        Schema::dropIfExists('expediente');
        Schema::dropIfExists('empleado');
    }
};
