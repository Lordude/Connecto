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
            ['name' => 'Ginette Moreau', 'email' => 'MGinette@yahoo.com', 'detail' => 'ma patente a marche pu', 'date' => '2022-03-29','frequent_issue_id' => '3'],
            ['name' => 'Marcel Moreau', 'email' => 'MMarcel@yahoo.com', 'detail' => 'Ma camera elle sallume a des moments bizares et intimes', 'date' => '2022-04-08','frequent_issue_id' => '2'],
            ['name' => 'Marmotte Moreau', 'email' => 'MMarmotte@hotmail.com', 'detail' => 'je pese sur power pis ca clignote mais ca sallume pas', 'date' => '2022-04-15','frequent_issue_id' => '1']
        ]);

    }
    
}
