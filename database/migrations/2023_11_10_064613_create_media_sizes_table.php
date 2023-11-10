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
        Schema::create('media_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size', 100);
            $table->string('media_type', 30)->nullable();
            $table->boolean('active_flag')->index()->default(true);
            $table->unique(['name', 'size', 'media_type']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_sizes');
    }
};
