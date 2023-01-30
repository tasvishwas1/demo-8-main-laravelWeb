<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'     => 'vihu',
                'email'    => 'vihu@gmail.com',
                'password' => md5('password'),
            ],
            [
                'name'     => 'pihu',
                'email'    => 'pihu@gmail.com',
                'password' => md5('password'),
            ],
            [
                'name'     => 'vishu',
                'email'    => 'vishu@gmail.com',
                'password' => md5('password'),
            ],
        ]);
    }
}
