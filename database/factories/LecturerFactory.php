<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecturer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $teknik = ['Fisika', 'Nuklir', 'Informatika'];
        $nidn = uniqid();

        return [
            'name' => 'Mas '.Str::random(5),
            'nidn' => $nidn,
            'photo' => $this->faker->image('storage/app/public/', 100, 100),
            'college_id' => rand(1, 20),
            'studyProgram' => 'Teknik '.Arr::random($teknik),
            'gender' => 'pria',
            'lastEducation' => 'S3'
        ];
    }
}
