<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\InvitationGuest;
use App\Models\Wish;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Wish>
 */
class WishFactory extends Factory
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
            'name' => fake()->name(),
            'message' => fake()->paragraph(),
            'is_visible' => true,
        ];
    }
}
