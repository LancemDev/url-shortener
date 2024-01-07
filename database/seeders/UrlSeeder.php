<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Urls as Url;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('urls')->insert([
            'user_id' => 1,
            'url' => 'https://www.google.com',
            'description' => 'Google',
            'short_url' => 'bit.ly/3o9Qq5b',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
