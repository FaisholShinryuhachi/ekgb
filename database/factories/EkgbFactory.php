<?php

namespace Database\Factories;

use App\Models\Ekgb;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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
        $array = ['Sudah Diproses', 'Belum Diproses'];
        $pendukung = [  '0laaEt0HmaJXxtV9QRmQX41tfl847RFlWf0ZpAJC.pdf',
                        '2QNk2Lpi6jdQGVPyFCj4JHG1Nwu1KSxKfQyfZV59.pdf',
                        '4o1fq3MX1kNAprNKs4MDKDi9wlyEiB3jPHZZrkLl.pdf',
                        '5J0nh6RlLWkSet2EJ83oIxu5PweVNekwcbPOYj47.pdf'
    ];
        return [
            // 'nip' => Str::random(10),
            'nip' => $this->faker->numberBetween($min = 10000000, $max = 90000000),
            'nama_pegawai' => $this->faker->name,
            'jabatan' => 'staff',
            'pangkat' => 'pegawai',
            'kgb_terakhir' => $this->faker->date,
            'status' => Arr::random($array),
            'pendukung' => Arr::random($pendukung),
            'pendukung2' => Arr::random($pendukung),
        ];
    }
}
