<?php


use Illuminate\Database\Seeder;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create(
            [                
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('123456'),
                'idrol'=>2,
                'estado'=>0
            ]
        );

        Usuario::create(
            [          
                'email'=>'usuario@gmail.com',
                'password'=>Hash::make('123456'),
                'idrol'=>1,       
                'estado'=>0
            ]
        );
    }
}
