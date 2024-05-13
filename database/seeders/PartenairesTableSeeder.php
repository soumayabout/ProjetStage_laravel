<?php

namespace Database\Seeders;
use App\Models\Partenaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartenairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('partenaires')->insert([
            'nom_partenaire' => 'partenaire',
            'created_at' => '2024-01-01 14:28:15',
            'updated_at' => '2024-01-01 14:28:15'
        ]);
       Partenaire::factory()->count(10)->create();
    }
}
