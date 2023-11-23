<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(4),
            'description' => fake()->text(40),
            'source_language_id' => Language::query()->inRandomOrder()->first()->id,
            'target_languages_ids' => Language::query()
                ->select('id')
                ->inRandomOrder()
                ->limit(3)
                ->get()
                ->map(function ($el) {
                    return $el->id;
                })
                ->toArray(),
            'use_machine_translate' => fake()->boolean(),
        ];
    }
}
