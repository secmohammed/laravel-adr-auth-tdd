<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('safra_name');
            $table->string('hotels_pro_name');
            $table->string('safra_address');
            $table->string('address');
            $table->string('hotels_pro_address');
            $table->bigInteger('hotels_pro_hotel_id');
            $table->bigInteger('safra_hotel_id');
            $table->bigInteger('hotels_pro_city_id');
            $table->bigInteger('safra_city_id');
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
        Schema::dropIfExists('hotels');
    }
}
