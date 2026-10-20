<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            $table->string('question', 500);
            $table->longText('answer');
            $table->unsignedInteger('sort_order')->default(0);

            $table->string('publication_status', 20)->default('draft');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->string('verified_by_name', 150)->nullable();

            $table->timestamps();

            $table->index(['publication_status', 'is_verified']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};