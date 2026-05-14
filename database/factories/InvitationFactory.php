<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brideName = fake()->firstName('female');
        $groomName = fake()->firstName('male');

        return [
            'user_id' => User::factory(),
            'template_id' => Template::factory(),
            'slug' => Str::slug($brideName.'-'.$groomName.'-'.Str::random(6)),
            'title' => 'Pernikahan '.$brideName.' & '.$groomName,
            'bride_name' => $brideName,
            'groom_name' => $groomName,
            'date' => fake()->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
            'start_time' => '10:00',
            'end_time' => '13:00',
            'venue' => fake()->company(),
            'address' => fake()->address(),
            'maps_url' => 'https://maps.google.com/?q='.urlencode(fake()->city()),
            'music_url' => null,
            'status' => 'draft',
            'published_at' => null,
            'expired_at' => now()->addMonths(6),
        ];
    }
}
