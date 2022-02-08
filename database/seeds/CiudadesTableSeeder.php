<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'nombre' => 'Bogotá',
            'departamento' => 'Cundinamarca',
            'longitud' => '4.60971',
            'latitud'  => '-74.08175',
            'estado' => 'activa'
        ]);

        DB::table('ciudades')->insert([
            'nombre' => 'Cali',
            'departamento' => 'Valle del cauca',
            'longitud' => '3.43722',
            'latitud'  => '-76.5225',
            'estado' => 'activa'
        ]);

        DB::table('ciudades')->insert([
            'nombre' => 'Medellin',
            'departamento' => 'Antioquia',
            'longitud' => '6.25184',
            'latitud'  => '-75.56359',
            'estado' => 'activa'
        ]);
    }
}
