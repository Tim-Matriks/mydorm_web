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
        Schema::create('helpdesk', function (Blueprint $table) {
            $table->id('helpdesk_id');
            $table->string('nip', 18);
            $table->string('nama', 100);
            $table->string('username');
            $table->string('password');
            $table->foreignId('gedung_id')->nullable()->constrained('gedung', 'gedung_id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpdesk');
    }
};
