<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique(); // Role name (e.g., admin, seller, customer)
            $table->timestamps();
        });

        // Insert default roles into the roles table
        DB::table('roles')->insert([
            ['role' => 'admin'],
            ['role' => 'seller'],
            ['role' => 'customer'], // Default role
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}