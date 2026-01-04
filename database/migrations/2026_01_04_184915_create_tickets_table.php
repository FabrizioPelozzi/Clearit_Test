<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->enum('ticket_type', ['1', '2', '3']);
            $table->enum('transport_mode', ['air', 'land', 'sea']);
            $table->string('product', 250);
            $table->string('origin_country', 100);
            $table->string('destination_country', 100);
            $table->enum('status', ['new', 'in_progress', 'completed']);
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
