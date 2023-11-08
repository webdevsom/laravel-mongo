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
        Schema::create('campaign_locations', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country');
            $table->enum('type', ['Include', 'Exclude']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_locations');
    }
};
