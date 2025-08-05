<?php
// database/migrations/2025_08_05_154821_add_timestamps_to_permissions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Silber\Bouncer\Database\Models;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(Models::table('permissions'), function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table(Models::table('permissions'), function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
};