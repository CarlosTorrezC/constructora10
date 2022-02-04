<?php


use Illuminate\Database\Seeder;
use App\Visita;

class VisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visita::create(
            [
                'dotacion'=>0,
                'herramienta'=>0,
                'material'=>0,
                'proyecto'=>0,
                'produccion'=>0,
                'ingreso'=>0,
                'usuario'=>0,
                'prestamo'=>0,
                'estadistica'=>0,
                'inicio'=>0,
                'ingresocreate'=>0,
                'ingresoshow'=>0,
                'prestamocreate'=>0,
                'prestamoshow'=>0
            ]
        );
    }
}
