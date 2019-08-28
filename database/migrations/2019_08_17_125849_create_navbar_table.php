<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavbarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table) {
             $table->string('name')->nullable();
             $table->string('logo')->nullable();
             $table->string('background_color')->nullable();
             $table->string('font_color')->nullable();
             $table->string('login_button_background')->nullable();
             $table->string('login_button_font_color')->nullable();
             $table->string('logout_button_background')->nullable();
             $table->string('logout_button_font_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbar');
    }
}
