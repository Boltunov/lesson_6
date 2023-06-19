<?php

declare(strict_types=1);

use App\Enums\NewsSources;
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
        Schema::table('news', static function (Blueprint $table): void {
            $table->enum('sources', NewsSources::allSources())->after('description');
            $table->index('sources');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('sources');
        });
    }
};
