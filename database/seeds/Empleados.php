<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Empleados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
        DB::table('empleados')->insert([
            'codigo'=>'abcd5845',
            'name'=>'Ramiro Flores',
            'salarioDolares'=>22.50,
            'salarioPesos'=>500.50,
            'direccion'=>'Av Principal 123',
            'estado'=>'Jalisco',
            'ciudad'=>'Guadalajara',
            'telefono'=>'3355774411',
            'correo'=>'correo1@dominio.com',
            'activo'=>1,
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s")
        ]);

        DB::table('empleados')->insert([
            'codigo'=>'esed8452',
            'name'=>'Pedro Morales',
            'salarioDolares'=>10.50,
            'salarioPesos'=>220.50,
            'direccion'=>'Calle Dos Num 423',
            'estado'=>'Jalisco',
            'ciudad'=>'Guadalajara',
            'telefono'=>'338547512',
            'correo'=>'correo2@dominio.com',
            'activo'=>1,
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s")
        ]);

        DB::table('empleados')->insert([
            'codigo'=>'rtds1547',
            'name'=>'Luis Silva',
            'salarioDolares'=>11.50,
            'salarioPesos'=>280.50,
            'direccion'=>'Vancoselos 852',
            'estado'=>'Jalisco',
            'ciudad'=>'Guadalajara',
            'telefono'=>'3366998855',
            'correo'=>'correo3@dominio.com',
            'activo'=>0,
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s")
        ]);
        
    }
}
