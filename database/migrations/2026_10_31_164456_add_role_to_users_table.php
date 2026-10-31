<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('student');
            });
        }
    }

    public function down(): void
    {
        // Intentionally left empty.
        // The role column may already exist before this migration.
        // Do not risk deleting existing user roles during rollback.
    }
};
