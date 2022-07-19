<?php

namespace Database\Factories;

use App\Models\Domaine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SauvegardeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => fake()->slug(1),
            'id_domaine' => fake()->numberBetween(1, 10),
            'version' => fake()->semver(),
            'poids' => '653Mo',
            'etat_sante' => 'Bien',
            'commentaire' => 'Faille Sécurité plugin KingComposer',
            'backup' => 'https://drive.google.com/file/d/1s7eQ0exWuKUMBA4OX6lNjNvMNJ76iOBb/view?usp=sharing'
        ];
    }
}
