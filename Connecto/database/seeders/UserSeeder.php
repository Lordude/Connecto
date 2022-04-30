<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            ['first_name' => 'Maurice', 'last_name' => 'Patate', 'email' => 'patateM@yahoo.ca', 'password' => Hash::make('patate123'), 'date_hired' => '1980-01-25', 'role_id' => '1'],
            ['first_name' => 'Mireille', 'last_name' => 'Beaupré', 'email' => 'xX_dark_spirit_Xx@hotmail.com', 'password' => Hash::make('secret321'), 'date_hired' => '1999-02-16', 'role_id' => '1'],
            ['first_name' => 'The', 'last_name' => 'Boss', 'email' => 'likeaboss@outlook.com', 'password' => Hash::make('imtheboss'), 'date_hired' => '1966-01-02', 'role_id' => '2']
        ]);

    }
}
