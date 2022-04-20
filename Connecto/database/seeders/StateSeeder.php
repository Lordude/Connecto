<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('states')->insert([
            ['name' => 'Opérationnel', 'description' => 'Le service est pleinement fonctionnel', 'image' => 'icone-operationnel.png'],
            ['name' => 'En maitenance', 'description' => 'Le service n\'est présentement pas fonctionnel mais notre équipe travaille activement à le rendre opérationnel.', 'image' => 'icone-maintenance.png'],
            ['name' => 'Détérioration de la performance', 'description' => 'Le service fonctionne mais une certaine lenteur peut être expérimenté.', 'image' => 'icone-deterioration.png'],
            ['name' => 'Panne partielle', 'description' => 'Certaines fonctionnalités du service sont opérationnelles, mais pas toutes.', 'image' => 'icone-panne-partielle.png'],
            ['name' => 'Panne majeure', 'description' => 'Le service n\'est pas fonctionnel', 'image' => 'icone-panne-majeure.png']
        ]);
    }
}
