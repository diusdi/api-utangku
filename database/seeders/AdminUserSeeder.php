<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@utang.com',
                'password' => Hash::make('qweasdzx'),
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
