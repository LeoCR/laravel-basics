<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedIndexToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->index('created_at');
            //$table->index('created_at','my_created_at_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropIndex('messages_created_at_index');/*
            el nombre del indice se construye a partir del nombre de la tabla guin bajo 
            + el nombre de las columnas involucradas guin bajo index
            */
            //$table->dropIndex('my_created_at_idx');
        });
    }
}
