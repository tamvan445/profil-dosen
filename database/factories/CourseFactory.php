<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_code' => Str::random(5),
            'course' => $this->faker
                ->randomElement($array = array (
                    'Matematika Dasar 1', 'Fisika Dasar 2',
                    'Statistika 2', 'Matematika Informatika 2', 'Matematika Lanjut 2')),
        ];
    }
}
