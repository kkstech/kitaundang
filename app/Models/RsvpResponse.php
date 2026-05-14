<?php

namespace App\Models;

use Database\Factories\RsvpResponseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RsvpResponse extends Model
{
    /** @use HasFactory<RsvpResponseFactory> */
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'guest_id',
        'status',
        'guest_count',
        'message',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(InvitationGuest::class, 'guest_id');
    }
}
