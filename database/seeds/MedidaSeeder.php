<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::select("insert into medida(id,nombre) values(1,'Gramo')");
       DB::select("insert into medida(id,nombre) values(2,'Kilogramo')");
       DB::select("insert into medida(id,nombre) values(3,'Tonelada')");
       DB::select("insert into medida(id,nombre) values(4,'Litro')");         
    }
}
