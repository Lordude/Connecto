<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequentIssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frequent_issues')->insert([
            ['problem' => 'Impossible pour l\'appareil de se connecter aux serveurs de Connecto'],
            ['problem' => 'Tous mes appareils Connecto affichent un message d\'erreur'],
            ['problem' => 'L\'application mobile ne charge pas (symbole de chargement en continu)'],
            ['problem' => 'Les alertes ne fonctionnent plus'],
            ['problem' => 'Impossible d\'accéder au flux vidéo et/ou l\'historique des enregistrements (Connecto Cam)'],
            ['problem' => 'Impossible d\'accéder aux services Connecto Pro (message d\'erreur ou symbole de chargement en continu)']
        ]);
    }
}
