<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        // Criar um vendor específico
        Vendor::create([
            'name' => 'ACME Corp',
            'vat_number' => 'BE123456789',
            'payment_terms' => 30, // dias
        ]);

        // Criar vendors fake
        Vendor::factory()->count(10)->create();
    }
}
