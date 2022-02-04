<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              
        DB::select("insert into empleado(nombre,apellido,ci,edad,sexo,usuario,estado,created_at,updated_at) values('Carlos Eduardo','Torrez Condarco','1234567',26,'M','admin@gmail.com',0,now(),null)");
        DB::select("insert into empleado(nombre,apellido,ci,edad,sexo,usuario,estado,created_at,updated_at) values('Juan','Cortex','7654321',23,'M','usuario@gmail.com',0,now(),null)");
    }
}
