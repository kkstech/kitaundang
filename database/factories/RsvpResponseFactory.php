<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\InvitationGuest;
use App\Models\RsvpResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RsvpResponse>
 */
class RsvpResponseFactory extends Factory
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
            'guest_id' => InvitationGuest::factory(),
            'status' => fake()->randomElement(['attending', 'not_attending']),
            'guest_count' => fake()->numberBetween(1, 4),
            'message' => fake()->optional()->sentence(),
        ];
    }
}
