<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_one')->nullable();
            $table->string('section_two')->nullable();
            $table->string('section_three')->nullable();
            $table->string('section_four')->nullable();
             $table->string('we')->nullable();
             $table->string('info')->nullable();
             $table->string('address')->nullable();
             $table->string('Phone', 20)->nullable();
             $table->string('fax', 20)->nullable();
             $table->string('facebook')->nullable();
             $table->string('google')->nullable();
             $table->string('linkedIn')->nullable();
             $table->string('twitter')->nullable();
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
        Schema::dropIfExists('footer');
    }
}
