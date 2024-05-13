<?php

namespace Database\Seeders;
use App\Models\Reunion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReunionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Reunion::factory()->count(10)->create();
    }
}
