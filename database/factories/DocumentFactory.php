<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = new Document();
        return [
            'name' => fake()->sentence(3),
            'data' => [
                [
                    'key' => fake()->word(),
                    'value' => fake()->sentence(),
                ],

                [
                    'key' => fake()->word(),
                    'value' => fake()->sentence(),
                ],

                [
                    'key' => fake()->word(),
                    'value' => fake()->sentence(),
                ],
            ],
            'status' => $status->status(),
        ];
    }
}
