<?php

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
        DB::table('users')->insert([
            'name' => 'Blue',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);
    }
}
