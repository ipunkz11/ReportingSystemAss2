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
        $user = [
            [
                'name' => 'Pur',
                'email' => 'pur@backend.com',
                'password' => bcrypt('123456'),
                'level' => 'owner',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@backend.com',
                'password' => bcrypt('admin11'),
                'level' => 'admin',
            ],
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
