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
            ['start_date' => '2022-04-21 20:10:00',
             'end_date' =>'2022-04-23 15:50:54',
             'commentary' =>'Le problème venait du serveur #13',
             'created_at' => '2022-04-21 22:10:46',
             'updated_at' => '2022-04-23 15:50:15',
             'state_id' => '1',
             'user_id' => '2']
        ]);
        DB::table('incidents')->insert([
            ['start_date' => '2022-04-27 04:30:00',
             'end_date' =>'2022-04-27 16:15:23',
             'commentary' =>'Le serveur #13 a encore des problèmes.',
             'created_at' => '2022-04-27 08:01:04',
             'updated_at' => '2022-04-27 16:15:45',
             'state_id' => '1',
             'user_id' => '1']
        ]);
        DB::table('incidents')->insert([
            ['start_date' => '2022-05-05 09:15:00',
             'end_date' =>'2022-05-05 14:20:16',
             'commentary' =>'Le problème venait du serveur #13. Peut-être qu\'il porte malheur?',
             'created_at' => '2022-05-05 09:30:00',
             'updated_at' => '2022-05-05 14:20:14',
             'state_id' => '1',
             'user_id' => '3']
        ]);
        DB::table('incidents')->insert([
            ['start_date' => '2022-05-13 10:40:00',
             'commentary' =>'Il semblerait que ce soit encore le serveur #13',
             'created_at' => '2022-05-13 11:05:43',
             'updated_at' => '2022-05-14 08:10:25',
             'state_id' => '2',
             'user_id' => '2']
        ]);
        DB::table('incidents')->insert([
            ['start_date' => '2022-05-14 04:15:00',
             'commentary' =>'Problème avec le serveur #13?',
             'created_at' => '2022-05-14 07:33:12',
             'updated_at' => '2022-05-14 07:33:12',
             'state_id' => '5',
             'user_id' => '1']
        ]);
    }

}
