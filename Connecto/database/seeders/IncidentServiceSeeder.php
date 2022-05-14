<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IncidentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incident_service')->insert([
            ['incident_id' => '1', 'service_id' => '2'],
            ['incident_id' => '1', 'service_id' => '5'],
            ['incident_id' => '1', 'service_id' => '6'],
            ['incident_id' => '2', 'service_id' => '3'],
            ['incident_id' => '3', 'service_id' => '4'],
            ['incident_id' => '4', 'service_id' => '2'],
            ['incident_id' => '4', 'service_id' => '5'],
            ['incident_id' => '5', 'service_id' => '9']
        ]);
    }
}
