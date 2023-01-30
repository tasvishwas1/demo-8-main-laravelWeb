<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'name'     => 'vishwas',
                'email'    => 'admin@gmail.com',
                'password' => md5('password'),
            ]
        ]);
    }
}
