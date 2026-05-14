<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Template::query()->updateOrCreate(
            ['name' => 'Classic Wedding'],
            [
                'category' => 'wedding',
                'thumbnail' => null,
                'preview_url' => '/u/classic-wedding-preview',
                'tier' => 'basic',
            ],
        );

        User::factory()->create([
            'name' => 'KitaUndang Demo',
            'email' => 'demo@kitaundang.id',
            'phone' => '081234567890',
        ]);
    }
}
