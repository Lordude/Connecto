<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {

        DB::table('services')->insert([
            ['name' => 'Connecto Web'],
            ['name' => 'Applications mobiles (iOS et Android'],
            ['name' => 'Caméra Connecto Cam'],
            ['name' => 'Thermostat Connecto Temp'],
            ['name' => 'Ampoule Connecto Light'],
            ['name' => 'Prise électrique Connecto Power'],
            ['name' => 'Sonnette Connecto Ring'],
            ['name' => 'Serrure Connecto Lock'],
            ['name' => 'Flux vidéo Connecto Cam en temps réel'],
            ['name' => 'Historique vidéo Connecto Cam'],
            ['name' => 'Alertes'],
            ['name' => 'Tableau de bord Connecto Pro'],
        ]);
    }
}
