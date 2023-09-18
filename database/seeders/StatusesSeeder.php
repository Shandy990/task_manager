<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['title' => 'draft']);
        Status::create(['title' => 'published']);
        Status::create(['title' => 'validate']);
        Status::create(['title' => 'done']);

    }
    
}
