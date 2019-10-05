<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiceActionsTable extends Migration
{
    /**
     * Run the migrations.
     * this migration was genereated with the command line:
     * php artisan make:model NiceAction -m
     * for running all the migrations using the command line:
     * php artisan migrate
     * @return void
     */
    public function up()
    {
        Schema::create('nice_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('niceness');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nice_actions');
    }
}
