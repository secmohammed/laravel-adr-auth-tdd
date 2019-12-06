<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_types', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id')->index();
            $table->decimal('adult_price', 65, 2);
            $table->decimal('child_6_12_price', 65, 2);
            $table->decimal('child_2_6_price', 65, 2);
            $table->decimal('infant_price', 65, 2);
            $table->unsignedBigInteger('currency_id')->index();
            $table->foreign('package_id')->on('packages')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('package_type');
    }
}
