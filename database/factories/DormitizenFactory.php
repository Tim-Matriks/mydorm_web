<?php

namespace Database\Factories;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Factories\Factory;

class DormitizenFactory extends Factory
{
    public function definition()
    {
        return [
            'nim' => '130' . $this->faker->unique()->numberBetween(1000000, 9999999),
            'nama' => $this->faker->name('male'),  // Menambahkan nama pria
            'prodi' => $this->faker->randomElement(['Informatika', 'Teknik Industri', 'Desain Produk']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
            'no_hp' => $this->faker->phoneNumber,
            'no_hp_ortu' => $this->faker->phoneNumber,
            'alamat_ortu' => $this->faker->address,
            'gambar' => $this->faker->imageUrl(300, 300, 'people', true),
            // Kamar_id akan ditentukan di seeder
              // Nanti akan diisi di seeder
        ];
    }

    public function dormitizenWanita(): static 
    {
        return $this->state(fn(array $attributes) => [
            'nama'=> $this->faker->name('female'), 
        ]);
    }
}

