<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthClosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_closures', function (Blueprint $table) {
            $table->increments('id');
            $table->date('first_date');
            $table->date('last_date');
            $table->integer('id_rule');
            $table->double('value_franchise')->default(0);
            $table->double('value_surplus')->default(0);
            $table->double('total_page')->default(0);
            $table->double('total_pay')->default(0);
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
        Schema::dropIfExists('month_closures');
    }
}
