<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->bigInteger('package_type_id');
            $table->string('package_name');
            $table->date('check_in_date');
            $table->json('rooms');
            $table->float('price', 65, 4);
            $table->string('currency');
            $table->string('user_title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('country');
            $table->string('state');
            $table->string('address');
            $table->string('postal_code');
            $table->date('approved_at')->nullable();
            $table->date('booked_at')->nullable();
            $table->date('cancelled_at')->nullable();
            $table->boolean('is_instant')->default(false);
            $table->foreign('package_id')->on('packages')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('package_reservations');
    }
}
