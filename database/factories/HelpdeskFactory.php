<?php

namespace Database\Factories;

use App\Models\Gedung;
use Illuminate\Database\Eloquent\Factories\Factory;

class HelpdeskFactory extends Factory
{
    protected $model = \App\Models\Helpdesk::class;

    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->numerify('##############'), // Generate NIP 18 digit
            'nama' => $this->faker->name, // Nama Helpdesk
        ];
    }
}
