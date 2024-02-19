<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name'      => 'IsSantri',
                'username'  => 'IsSantri',
                'email'     => 'satri@gmail.com',
                'foto'     => 'satri@logo.png',
                'password'  => bcrypt('12345'),
                'roles_id'  => 2
            ],
            [
                'name'      => 'IsAdmin',
                'username'  => 'IsAdmin',
                'foto'     => 'satri@logo.png',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('12345'),
                'roles_id'  => 1
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}