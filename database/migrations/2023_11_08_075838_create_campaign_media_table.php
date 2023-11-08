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
        Schema::create('campaign_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->nullOnDelete();
            $table->string('name'); 
            $table->string('url'); 
            $table->string('destination_url')->nullable();
            $table->text('script')->nullable();
            $table->string('size')->nullable();
            $table->boolean('active_flag')->index()->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_media');
    }
};
