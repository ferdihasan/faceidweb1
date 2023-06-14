<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "karyawan_id" => fake()->randomDigit(),
            "tanggal_absen" => fake()->dateTimeBetween('-1 week', 'now'),
            "waktu_absen" => fake()->time(),
        ];
    }
}
