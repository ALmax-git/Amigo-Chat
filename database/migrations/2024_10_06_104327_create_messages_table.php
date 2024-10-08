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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
    $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
    $table->text('content');
    $table->enum('message_type', ['text', 'media'])->default('text');
    $table->boolean('has_attachment')->default(false);
    $table->foreignId('attachment_id')->nullable()->constrained('files')->onDelete('set null');
    $table->enum('status', ['sent', 'delivered', 'seen'])->default('sent');
    $table->timestamp('deleted_at')->nullable();
    $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
    $table->boolean('is_seen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
