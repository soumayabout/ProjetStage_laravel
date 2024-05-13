<?php

namespace Database\Seeders;
use App\Models\Secteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('secteurs')->insert([
            'nom_secteur' => 'secteur',
            'created_at' => '2024-01-01 14:28:15',
            'updated_at' => '2024-01-01 14:28:15'
        ]);
       Secteur::factory()->count(10)->create();
    }
}
