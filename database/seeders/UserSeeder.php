<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =  User::create([
            'firstname' => 'Azizbek',
            'lastname' => 'Jo\'rayev',
            'phone' => '+998999051524',
            'username' => 'smartmenu',
            'password' => Hash::make('smart123'),
        ]);
        $admin->assignRole('admin');

        $testuser =  User::create([
            'firstname' => 'Shavkat',
            'lastname' => 'Mirziyoyev',
            'phone' => '+998946665335',
            'username' => 'susambil',
            'password' => Hash::make('susambil123'),
        ]);
        $testuser->assignRole('client');

    }
}
