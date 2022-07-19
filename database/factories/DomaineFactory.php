<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DomaineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'domaine' => fake()->domainName(),
            'slug' => fake()->slug(1),
            'type_site' => 'WordPress',
            'serveur' => 'SyS-31',
            'php_version' => '7.4.33',
            'backoffice' => fake()->url()
        ];
    }
}
