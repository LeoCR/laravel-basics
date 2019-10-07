<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePokemons extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(){
        Schema::dropIfExists('pokemon');
    }
}
