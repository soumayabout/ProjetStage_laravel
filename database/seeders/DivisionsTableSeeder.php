<?php

namespace Database\Seeders;
use App\Models\Division;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('divisions')->insert([
            'nom_division' => 'division',
            'created_at' => '2024-01-01 14:28:15',
            'updated_at' => '2024-01-01 14:28:15'

        ]);
            
        Division::factory()->count(10)->create();
    }
}
