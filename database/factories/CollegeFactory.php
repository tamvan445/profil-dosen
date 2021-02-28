<?php

namespace Database\Factories;

use App\Models\College;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollegeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = College::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $accreditation = ['A', 'B', 'C'];

        return [
            'name' => 'Universitas '.Str::random(5),
            'accreditation' =>  Arr::random($accreditation)
        ];
    }
}
