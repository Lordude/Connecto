<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReportServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_service')->insert([
            ['report_id' => '1', 'service_id' => '2'],
            ['report_id' => '2', 'service_id' => '3'],
            ['report_id' => '3', 'service_id' => '6'],
            ['report_id' => '4', 'service_id' => '1'],
            ['report_id' => '5', 'service_id' => '5'],

        ]);
    }
}
