<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageHotelTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_hotel_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_hotel_id')->index();
            $table->string('locale');
            $table->string('name');
            $table->string('description');
            $table->foreign('package_hotel_id')->on('package_hotels')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('package_hotel_translations');
    }
}
