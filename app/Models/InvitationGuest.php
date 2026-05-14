<?php

namespace App\Models;

use Database\Factories\InvitationGuestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationGuest extends Model
{
    /** @use HasFactory<InvitationGuestFactory> */
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'name',
        'phone',
        'token',
        'opened_at',
        'rsvp_status',
        'rsvp_count',
    ];

    protected function casts(): array
    {
        return [
            'opened_at' => 'datetime',
        ];
    }

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function rsvpResponses(): HasMany
    {
        return $this->hasMany(RsvpResponse::class, 'guest_id');
    }

    public function wishes(): HasMany
    {
        return $this->hasMany(Wish::class, 'guest_id');
    }
}
