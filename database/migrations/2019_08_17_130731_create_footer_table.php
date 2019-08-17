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
             $table->string('we')->default(null);
             $table->string('info')->default(null);
             $table->string('address')->default(null);
             $table->string('Phone')->default(null);
             $table->string('fax')->default(null);
             $table->string('facebook')->default(null);
             $table->string('google')->default(null);
             $table->string('linkedIn')->default(null);
             $table->string('twitter')->default(null);
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
