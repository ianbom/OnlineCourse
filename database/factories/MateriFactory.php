<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materi>
 */
class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $video = Storage::disk('public')->files('materi/video');
        $randVideo = $video ? $video[array_rand($video)] : null;

        $textBook = Storage::disk('public')->files('materi/text_book');
        $randTextBook = $textBook ? $textBook[array_rand($textBook)] : null;

        return [
            'id_course' => $this->faker->numberBetween(1, 10),
            'name_materi' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'video' => $randVideo,
            'text_book' => $randTextBook,
        ];
    }
}
