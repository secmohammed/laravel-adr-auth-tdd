<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTypeGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_type_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_type_id')->index();
            $table->integer('adults_no');
            $table->integer('child_6_12_no');
            $table->integer('child_2_6_no');
            $table->integer('infant_no');
            $table->foreign('package_type_id')->on('package_types')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('package_type_guests');
    }
}
