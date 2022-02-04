<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::select("insert into tema(id,nombre) values(1,'Normal')");
       DB::select("insert into tema(id,nombre) values(2,'Premium')");
    }
}
