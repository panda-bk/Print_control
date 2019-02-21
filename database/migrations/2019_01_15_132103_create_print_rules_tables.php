<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintRulesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_rules_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_print')->unsigned();
            $table->foreign('id_print')->references('id')->on('prints');
            $table->integer('id_rules')->unsigned();
            $table->foreign('id_rules')->references('id')->on('rules');
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
        Schema::dropIfExists('print_rules_tables');
    }
}
