<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
        });

        // Ajout de la contrainte de vérification pour simuler une colonne ENUM
        DB::statement("ALTER TABLE users ADD CONSTRAINT check_role CHECK (role IN ('user', 'admin'))");
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        // Suppression de la contrainte de vérification
        DB::statement("ALTER TABLE users DROP CONSTRAINT check_role");
    }
}