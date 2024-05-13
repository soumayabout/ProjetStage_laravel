<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Partenaire;
use App\Models\Reunion;
use App\Models\Secteur;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reunion>
 */
class ReunionFactory extends Factory
{
    protected $model = Reunion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_reunion' => $this->faker->date(),
            'sujet_reunion' => $this->faker->sentence,
            'divisions_id' => Division::pluck('id')->random(),
            'suggestion' => $this->faker->paragraph,
            'prochaine_reunion' => $this->faker->date(),
            'cadre' => $this->faker->word,
            'cout_cadre' => $this->faker->randomFloat(4, 0, 100000),
            'secteurs_id' =>Secteur::pluck('id')->random(),
            'partenaires_id' =>Partenaire::pluck('id')->random(),
            'contribution_partenaire' => $this->faker->randomFloat(4, 0, 100000),
            'statuts_id' =>Statut::pluck('id')->random(),
            'etat_avancement' => $this->faker->word,
            'file_path' => $this->faker->filePath,
        ];;
    }
}
