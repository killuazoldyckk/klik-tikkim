
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('instagram_reels', function (Blueprint $table) {
            $table->foreignId('created_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')->nullable();
            $table->string('verified_by_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('instagram_reels', function (Blueprint $table) {
            $table->dropConstrainedForeignId('created_by_user_id');
            $table->dropColumn([
                'verified_at',
                'verified_by_name',
            ]);
        });
    }
};
