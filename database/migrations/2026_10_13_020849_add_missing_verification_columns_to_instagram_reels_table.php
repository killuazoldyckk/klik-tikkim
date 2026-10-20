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
        if (! Schema::hasColumn('instagram_reels', 'created_by_user_id')) {
            Schema::table('instagram_reels', function (Blueprint $table) {
                $table->foreignId('created_by_user_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete();
            });
        }

        if (! Schema::hasColumn('instagram_reels', 'verified_at')) {
            Schema::table('instagram_reels', function (Blueprint $table) {
                $table->timestamp('verified_at')->nullable();
            });
        }

        if (! Schema::hasColumn('instagram_reels', 'verified_by_name')) {
            Schema::table('instagram_reels', function (Blueprint $table) {
                $table->string('verified_by_name')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instagram_reels', function (Blueprint $table) {
            //
        });
    }
};
