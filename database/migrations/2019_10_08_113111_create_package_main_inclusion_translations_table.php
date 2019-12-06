<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageMainInclusionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_main_inclusion_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('main_inclusion_id')->index();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();
            $table->foreign('main_inclusion_id')->references('id')->on('package_main_inclusions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_main_inclusion_translations');
    }
}
