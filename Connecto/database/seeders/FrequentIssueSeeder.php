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
            ['problem' => 'Mon appareil ne s\'allume pas.'],
            ['problem' => 'Mon appareil s\'allume, mais ne se connecte pas aux services Connecto'],
            ['problem' => 'Mon appareil s\'allume et semble se connecter, mais n\'agit pas comme souhaité'],
            ['problem' => 'Mon service ou application ne démarre pas'],
            ['problem' => 'Mon service ou application démarre, mais n\'est pas fonctionnelle'],
            ['problem' => 'Mon service ou application semble fonctionner, mais n\'agit pas comme souhaité'],
            ['problem' => 'Autre']
        ]);
    }
}
