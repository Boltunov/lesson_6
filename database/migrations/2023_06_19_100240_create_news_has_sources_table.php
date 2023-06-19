<?php

declare(strict_types=1);

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
        Schema::create('news_has_sources', static function (Blueprint $table):void {
            $table->foreignId('news_sources_id')
                ->references('id')
                ->on('news_sources')->cascadeOnDelete();
            $table->foreignId('news_id')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_has_sources');
    }
};
