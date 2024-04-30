<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                
            ],
            [
                'username' => 'user1',
                'role' => 'user',
                'password' => bcrypt('user_test1'),
              
                
            ],
        ];
    
        foreach ($data as $userData) {
            
            if (!User::where('username', $userData['username'])->exists()) {
                User::create($userData);
            }
        }
    }
    
}
