<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\InvitationGuest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<InvitationGuest>
 */
class InvitationGuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invitation_id' => Invitation::factory(),
            'name' => fake()->name(),
            'phone' => fake()->numerify('08##########'),
            'token' => Str::random(32),
            'opened_at' => null,
            'rsvp_status' => null,
            'rsvp_count' => null,
        ];
    }
}
