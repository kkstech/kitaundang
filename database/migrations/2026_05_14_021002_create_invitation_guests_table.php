<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invitation_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('token')->unique();
            $table->timestamp('opened_at')->nullable();
            $table->string('rsvp_status')->nullable();
            $table->unsignedSmallInteger('rsvp_count')->nullable();
            $table->timestamps();

            $table->index(['invitation_id', 'rsvp_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_guests');
    }
};
