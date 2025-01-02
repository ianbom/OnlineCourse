<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = Storage::disk('public')->files('course/image');
        $randImage = $image ? $image[array_rand($image)] : null;

        return [
            'name_course' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'image' => $randImage,
            'video' => null
        ];
    }
}
