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
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellidos', 100);
            $table->string('telefono', 12);
            $table->string('correo', 40)->unique();
            $table->date('fecha_nacimiento');
            $table->decimal('nota_media', 4,2);
            $table->text('experiencia');
            $table->text('formacion');
            $table->text('habilidades');
            $table->string('fotografia',100)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
