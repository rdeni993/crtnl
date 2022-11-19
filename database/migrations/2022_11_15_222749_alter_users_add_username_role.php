<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 
 * Custom migration, alter users table
 * add 
 * 
 *  username
 *  role
 * 
 * columns to user table.
 * 
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){

            $table->string('username')->after('name');
            $table->enum('role', ['client', 'secretary', 'administrator'])->after('password');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn(['username', 'role']);
        });
    }
};
