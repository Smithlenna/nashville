<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array(
                "id" => 1,
                "name" => 'Nashville Admin',
                "email" => "admin@nashville.com",
                "password" => Hash::make('websitefornurses')
            ),
        );
        DB::table('users')->insert($users);
    }
}
