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
        Schema::create('campaign_audiences', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->smallInteger('min_age')->nullable();
            $table->smallInteger('max_age')->nullable();
            $table->json('educations')->nullable();
            $table->json('occupations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_audiences');
    }
};
