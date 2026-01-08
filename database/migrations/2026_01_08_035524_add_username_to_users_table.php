<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('email');
        });

        DB::statement('UPDATE users SET username = CONCAT("user", id) WHERE username IS NULL');

        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(false)->change();
        });

        DB::statement('ALTER TABLE users ADD UNIQUE INDEX users_username_unique (username)');
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_username_unique');
            $table->dropColumn('username');
        });
    }
};
