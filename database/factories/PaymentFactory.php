<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'invitation_id' => Invitation::factory(),
            'midtrans_order_id' => 'KTU-'.Str::upper(Str::random(12)),
            'amount' => fake()->randomElement([99000, 179000]),
            'status' => 'pending',
            'paid_at' => null,
        ];
    }
}
