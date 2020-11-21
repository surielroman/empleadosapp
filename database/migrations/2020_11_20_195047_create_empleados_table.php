<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            /*
            id INT(11) NOT NULL
            codigo VARCHAR(40) NOT NULL
            nombre VARCHAR(120) NOT NULL
            salarioDolores DOUBLE
            salarioPesos DOUBLE
            direccion VARCHAR(250) NOT NULL
            estado VARCHAR(50) NOT NULL
            ciudad VARCHAR(50) NOT NULL
            telefono VARCHAR(10) NOT NULL
            correo VARCHAR(100) NOT NULL
            activo TYNINT(1) DEFAULT 0
            deleted_at TIMESTAMP
            created_at TIMESTAMP
            updated_at TIMESTAMP
            */
            $table->increments('id');
            $table->string('codigo',40)->unique();
            $table->string('name',120);
            $table->double('salarioDolares', 8, 2);
            $table->double('salarioPesos', 8, 2);
            $table->string('direccion',250);
            $table->string('estado',50);
            $table->string('ciudad',50);
            $table->string('telefono',10);
            $table->string('correo',100)->unique();
            $table->tinyInteger('activo')->default('0');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->dateTime('deleted_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
