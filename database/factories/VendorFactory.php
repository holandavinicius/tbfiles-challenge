<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'vat_number' => 'BE' . $this->faker->numerify('#########'),
            'payment_terms' => $this->faker->numberBetween(1,30),
        ];
    }
}
