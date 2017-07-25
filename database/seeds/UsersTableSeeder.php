<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Guilherme Santos',
        	'email' => 'guilhermedev@hotmail.com',
        	'password' => bcrypt('franklin2017'),
        	'status' => 'programmer'
        ]);
    }
}
