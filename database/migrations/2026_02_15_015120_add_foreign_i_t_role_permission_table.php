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
        Schema::table('role_permission', function (Blueprint $table) {
            if (!Schema::hasColumn('role_permission', 'role_id')) {
                $table->foreignId('role_id')->constrained('roles');
            }
            if (!Schema::hasColumn('role_permission', 'permission_id')) {
                $table->foreignId('permission_id')->constrained('permissions');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
