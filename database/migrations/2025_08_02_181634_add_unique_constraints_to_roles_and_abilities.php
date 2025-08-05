<?php

/* database/migrations/2025_08_02_181634_add_unique_constraints_to_roles_and_abilities.php */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Silber\Bouncer\Database\Models;
use Illuminate\Support\Facades\DB; // Add this line

return new class extends Migration
{
    public function up(): void
    {
        // Add unique constraint to roles table if it doesn't exist
        Schema::table(Models::table('roles'), function (Blueprint $table) {
            $existingConstraints = DB::select("SELECT constraint_name FROM information_schema.table_constraints WHERE table_name = ? AND constraint_type = 'UNIQUE'", [Models::table('roles')]);
            $constraintNames = array_column($existingConstraints, 'constraint_name');
            
            if (!in_array('roles_name_scope_unique', $constraintNames)) {
                $table->unique(['name', 'scope'], 'roles_name_scope_unique');
            }
        });

        // Add unique constraint to abilities table if it doesn't exist
        Schema::table(Models::table('abilities'), function (Blueprint $table) {
            $existingConstraints = DB::select("SELECT constraint_name FROM information_schema.table_constraints WHERE table_name = ? AND constraint_type = 'UNIQUE'", [Models::table('abilities')]);
            $constraintNames = array_column($existingConstraints, 'constraint_name');
            
            if (!in_array('abilities_name_scope_unique', $constraintNames)) {
                $table->unique(['name', 'scope'], 'abilities_name_scope_unique');
            }
        });
    }

    public function down(): void
    {
        Schema::table(Models::table('roles'), function (Blueprint $table) {
            $table->dropUnique('roles_name_scope_unique');
        });

        Schema::table(Models::table('abilities'), function (Blueprint $table) {
            $table->dropUnique('abilities_name_scope_unique');
        });
    }
};