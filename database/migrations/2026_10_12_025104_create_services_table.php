<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_category_id')
                ->constrained('service_categories')
                ->restrictOnDelete();

            $table->string('title', 200);
            $table->string('slug', 220)->unique();
            $table->string('summary', 500)->nullable();
            $table->longText('content')->nullable();
            $table->string('official_url', 2048)->nullable();

            // Konten baru belum boleh dianggap siap dipublikasikan.
            $table->string('publication_status', 20)->default('draft');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->string('verified_by_name', 150)->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['publication_status', 'is_verified']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};