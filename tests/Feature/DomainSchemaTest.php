<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\Gallery;
use App\Models\Invitation;
use App\Models\Template;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DomainSchemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_invitation_domain_records_can_be_created(): void
    {
        $user = User::factory()->create();
        $template = Template::factory()->create([
            'name' => 'Classic Wedding',
            'tier' => 'basic',
        ]);

        $invitation = Invitation::factory()
            ->for($user)
            ->for($template)
            ->hasGuests(2)
            ->has(BankAccount::factory(), 'bankAccount')
            ->has(Gallery::factory()->count(3), 'galleries')
            ->create();

        $this->assertSame($user->id, $invitation->user->id);
        $this->assertSame('Classic Wedding', $invitation->template->name);
        $this->assertCount(2, $invitation->guests);
        $this->assertNotNull($invitation->bankAccount);
        $this->assertCount(3, $invitation->galleries);
    }
}
