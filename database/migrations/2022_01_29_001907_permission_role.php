<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("label")->nullable();
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("label")->nullable();
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer("permission_id")->unsigned();
            $table->integer("role_id")->unsigned();
            
            $table->foreign("permission_id")->references("id")->on("permissions")->onDelete("cascade")->onUpdate("cascade");
            // $table->foreignId("permission_id")->constrained("permissions");
            $table->foreign("role_id")->references("id")->on("roles")->onDelete("cascade")->onUpdate("cascade");
            // $table->foreignId("role_id")->constrained("roles");

            $table->primary(["permission_id", "role_id"]);
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->integer("user_id")->unsigned();
            $table->integer("role_id")->unsigned();
            
            $table->foreign("role_id")->references("id")->on("roles")->onDelete("cascade")->onUpdate("cascade");
            // $table->foreignId("role_id")->constrained("roles");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            // $table->foreignId("user_id")->constrained("users");
            
            $table->primary(["role_id", "user_id"]);
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
