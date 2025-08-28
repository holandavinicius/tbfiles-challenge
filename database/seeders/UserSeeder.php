<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 10 usuários falsos com dados aleatórios
        User::factory()->count(10)->create();

        // Cria um usuário específico para teste
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => '123456', // será hasheado automaticamente se User model tiver cast 'hashed'
            'email_verified_at' => now(),
        ]);
    }
}
