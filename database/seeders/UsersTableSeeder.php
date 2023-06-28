<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('users')->insert([
            [//Admin
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'photo' => 'uploads/admin/regie.jpg',
                'phone' => '09191853030',
                'address' => 'Mabini',
                'password' => Hash::make('111'),
                'role' => 'admin'
            ],
            [//Customer
                'name' => 'User',
                'email' => 'user@gmail.com',
                'photo' => 'uploads/admin/regie.jpg',
                'phone' => '09191853030',
                'address' => 'Mabini',
                'password' => Hash::make('111'),
                'role' => 'customer'
            ],
            
        ]);

        
    }
}
