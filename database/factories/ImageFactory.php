<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_id' => \Illuminate\Support\Str::uuid() . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'url' => 'https://www.upload.ee/image/17345939/upload-profile.jpg',
        ];
    }
}
