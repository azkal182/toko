<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'address' => 'cerih',
            'phone' => '123456789',
            'username' => 'user',
            'password' => bcrypt('user')
        ]);
    }
}
