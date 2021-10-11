<?php

namespace Database\Factories;

use App\Models\Ekgb;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EkgbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ekgb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => Str::random(10),
            'nama_pegawai' => $this->faker->name,
            'jabatan' => 'pegawai',
            'pangkat' => 'pegawai',
            'kgb_terakhir' => $this->faker->date,
            'status' => 'aktif'
        ];
    }
}
