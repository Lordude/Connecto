<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidents')->insert([
            ['start_date' => '2022-04-20', 'state_id' => '5', 'user_id' => '1']
        ]);
        DB::table('incidents')->insert([
            ['start_date' => '2022-3-27','end_date' =>'2022-04-07', 'state_id' => '2', 'user_id' => '3']
        ]);
    }
    
}
