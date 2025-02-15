<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Translation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => $this->faker->word, 
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de']), // Supported locales
            'content' => $this->faker->sentence, // Fake translation content
            'tags' => implode(',', $this->faker->randomElements(['mobile', 'desktop', 'web', 'api'], rand(1, 2))) // Random tags
        ];
    }
}
