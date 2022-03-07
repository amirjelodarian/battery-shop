<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->integer("product_photo_id")->unsigned();
            $table->string("title", 255);
            $table->string("brand", 255);
            $table->string("type", 255);
            $table->string("for_what", 255);
            $table->string("company", 255);
            $table->string("price", 255);
            $table->string("warranty", 255)->nullable();
            $table->timestamps();
            // $table->foreignId("user_id")->constrained("users");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('product_photo_id')->references("id")->on("product_photos")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
