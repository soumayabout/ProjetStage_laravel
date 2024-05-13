<?php

namespace Database\Seeders;
use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('statuts')->insert([
            'nom_statut' => 'statut',
            'created_at' => '2024-01-01 14:28:15',
            'updated_at' => '2024-01-01 14:28:15'
        ]);
        Statut::factory()->count(10)->create();
    }
}
