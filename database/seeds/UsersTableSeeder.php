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
            'name' => 'Daniel',
            'email' => 'contato@danielmota.com.br',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Usuario comum',
            'email' => 'eu@danielmota.com.br',
            'password' => bcrypt('123456')
        ]);
    }
}