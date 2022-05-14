<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            ['name' => 'Ginette Moreau', 'email' => 'MGinette@yahoo.com', 'detail' => 'ma patente a marche pu', 'date' => '2022-04-29','frequent_issue_id' => '3', 'created_at' => '2022-04-30'],
            ['name' => 'Marcel Moreau', 'email' => 'MMarcel@yahoo.com', 'detail' => 'Ma camera elle sallume a des moments bizares et intimes', 'date' => '2022-04-08','frequent_issue_id' => '5', 'created_at' => '2022-04-8'],
            ['name' => 'Marmotte Moreau', 'email' => 'MMarmotte@hotmail.com', 'detail' => 'je pese sur power pis ca clignote mais ca sallume pas', 'date' => '2022-04-15','frequent_issue_id' => '1', 'created_at' => '2022-04-15'],
            ['name' => 'Angèle Moreau', 'email' => 'Amoreau@hotmail.com', 'detail' => 'Ma caméra marche pu', 'date' => '2022-05-14','frequent_issue_id' => '5', 'created_at' => '2022-05-14'],
            ['name' => 'Gino Moreau', 'email' => 'Gmoreau@hotmail.com', 'detail' => 'Je vois pu rien, mes ampoules ne fonctionnent plus...au secours!!!', 'date' => '2022-04-14','frequent_issue_id' => '6', 'created_at' => '2022-04-14']
        ]);

    }

}
