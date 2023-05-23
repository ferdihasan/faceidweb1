<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "nik" => fake()->nik(),
            "alamat" => fake()->city(),
            "tanggal_lahir" => fake()->dateTimeBetween('-40 years', '-20 years'),
            "tanggal_join" => fake()->dateTimeBetween('-10 years'),
        ];
    }
}
