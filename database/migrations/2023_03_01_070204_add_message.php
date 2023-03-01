<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments(column:'id');
            $table->integer(column:'from_id')->unsigned();
            $table->integer(column:'to_id')->unsigned();
            $table->foreign(columns:'from_id', name:'from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign(columns:'to_id', name:'to')->references('id')->on('users')->onDelete('cascade');
            $table->text(column:'content');
            $table->timestamp(column:'created_at')->useCurrent();
            $table->dateTime(column:'read_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
