
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instagram_reels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('instagram_url', 2048);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'is_verified', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instagram_reels');
    }
};
